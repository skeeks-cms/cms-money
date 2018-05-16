<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money;

use yii\base\BaseObject;

/**
 * @property string   $amount
 * @property Currency $currency
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class Money extends BaseObject
{
    /**
     * @var mixed
     */
    private $_amount;

    /**
     * @var Currency
     */
    private $_currency;

    /**
     * Money constructor.
     *
     * @param array           $amount
     * @param Currency|string $currency
     */
    public function __construct($amount, $currency)
    {
        $this->_amount = (string)$amount;
        $this->_currency = Currency::getInstance($currency);

        parent::__construct([]);
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->_amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->_currency;
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->format();
    }
    /**
     * @param array $options
     * @param array $textOptions
     * @return string
     */
    public function format($options = [], $textOptions = [])
    {
        return \Yii::$app->formatter->asCurrency($this->_amount, $this->_currency->code, $options, $textOptions);
    }

    public function add(self $other)
    {
        //$other = $other->convertToCurrency($this->currency);

        //$this->assertSameCurrency($this, $other);

        $value = $this->amount + $other->getAmount();

        $this->assertIsFloat($value);

        return $this->newMoney($value);
    }
}