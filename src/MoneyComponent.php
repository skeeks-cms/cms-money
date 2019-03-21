<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money;

use skeeks\cms\base\Component;
use skeeks\cms\money\models\MoneyCurrency;
use yii\helpers\ArrayHelper;

/**
 * @property string currencyCode;
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class MoneyComponent extends Component
{
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
    
    /**
     * Базовая валюта относительно которой считается курс
     * @deprecated 
     * @var string
     */
    public $baseCurrencyCode = "RUB";

}