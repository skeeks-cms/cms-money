<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money;

use skeeks\cms\backend\widgets\ActiveFormBackend;
use skeeks\cms\base\Component;
use skeeks\cms\money\assets\Asset;
use skeeks\cms\money\models\MoneyCurrency;
use skeeks\yii2\form\fields\SelectField;
use yii\helpers\ArrayHelper;

/**
 * @property string currencyCode;
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class MoneyComponent extends Component
{
    /**
     * Базовая валюта относительно которой считается курс
     * @var string
     */
    public $currency_code = "RUB";

    /**
     * @var string
     */
    public $currency_symbol = "";//"р.";

    /**
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('skeeks/money', 'Currencies'),
            'image' => [
                Asset::class, 'icons/money-bag.png'
            ],
        ]);
    }

    /**
     * @return ActiveFormBackend|\yii\widgets\ActiveForm
     */
    public function beginConfigForm()
    {
        return ActiveFormBackend::begin();
    }

    /**
     * @return array
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['currency_code', 'string'],
            ['currency_symbol', 'string']
        ]);
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'currency_code'       => \Yii::t('skeeks/money', 'Валюта по умолчанию'),
            'currency_symbol'       => \Yii::t('skeeks/money', 'Символ валюты'),
        ]);
    }

    /**
     * @return array
     */
    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'currency_code'       => \Yii::t('skeeks/money', 'Валюта в которой будут выводиться цены на сайте.'),
            'currency_symbol'       => \Yii::t('skeeks/money', 'Символ валюты, который будет отображаться у выбранной валюты. Если не задан, будет выводится автоматически.'),
        ]);
    }

    /**
     * @return array
     */
    public function getConfigFormFields()
    {
        return [
            'currency_code' => [
                'class' => SelectField::class,
                'items' => ArrayHelper::map(
                    MoneyCurrency::find()->all(),
                    'code',
                    'asText'
                )
            ],
            'currency_symbol'
        ];
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return \Yii::$app->formatter->currencyCode;
    }
    
    /**
     * Справочник данных по валютам
     *
     * @var array
     */
    public $baseCurrenciesData = [];

    /**
     *
     */
    public function init()
    {
        parent::init();

        if ($this->baseCurrenciesData) {
            $this->baseCurrenciesData = ArrayHelper::merge(Currency::$currencies, $this->baseCurrenciesData);
        } else {
            $this->baseCurrenciesData = Currency::$currencies;
        }

        \Yii::$app->formatter->currencyCode = $this->currency_code;
        if ($this->currency_symbol) {
            \Yii::$app->formatter->numberFormatterSymbols = ArrayHelper::merge(\Yii::$app->formatter->numberFormatterSymbols, [
                \NumberFormatter::CURRENCY_SYMBOL => $this->currency_symbol
            ]);
        }
    }


    /**
     *
     * Возвращает отформатированную строку цены.
     * При этом значение конвертируется в текущую валюту currencyCode.
     *
     * ***
     *
     * Returns a formatted price string.
     * The value is converted to the current currencyCode currency.
     *
     * @param Money $money
     * @param array $options
     * @param array $textOptions
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function convertAndFormat(Money $money, $options = [], $textOptions = [])
    {
        $money->convertToCurrency($this->currencyCode);
        return $this->format($money, $options, $textOptions);
    }

    /**
     * Возвращает отформатированную строку цены.
     *
     * ***
     *
     * Returns a formatted price string.
     *
     * @param Money $money
     * @param array $options
     * @param array $textOptions
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function format(Money $money, $options = [], $textOptions = [])
    {
        return \Yii::$app->formatter->asCurrency($money->amount, $money->currency->code, $options, $textOptions);
    }




    
    
    /**
     * @return Money
     * @deprecated
     */
    public function newMoney()
    {
        return new Money('0', $this->currencyCode);
    }
    
    /**
     * @return array|MoneyCurrency[]
     * @deprecated
     */
    public function getActiveCurrencies()
    {
        return MoneyCurrency::find()->where(['is_active' => 1])->all();
    }
    


}