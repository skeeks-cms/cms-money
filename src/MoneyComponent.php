<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money;

use skeeks\cms\base\Component;
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
     * Базовая валюта относительно которой считается курс
     *
     * @var string
     */
    public $baseCurrencyCode = "RUB";

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
        }
    }

    /**
     * @return Money
     */
    public function newMoney()
    {
        return new Money('0', $this->currencyCode);
    }

}