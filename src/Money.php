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
 * new Money(10, 'RUB');
 *
 * @property string   $amount
 * @property Currency $currency
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class Money extends BaseObject
{
    /**
     * @var string
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
        $this
            ->setAmount($amount)
            ->setCurrency($currency);

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
     * @param string|int|float $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->_amount = trim((string)$amount);
        return $this;
    }
    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->_currency;
    }
    /**
     * @param Currency|string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->_currency = Currency::getInstance($currency);
        return $this;
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
     *
     * @return string
     */
    public function format($options = [], $textOptions = [])
    {
        return \Yii::$app->formatter->asCurrency($this->_amount, $this->_currency->code, $options, $textOptions);
    }

    /**
     * TODO: добавить проверки когда отключена bcadd
     *
     * @param Money $other
     * @return $this
     */
    public function add(self $other)
    {
        //$other = $other->convertToCurrency($this->currency);
        //$this->assertSameCurrency($this, $other);
        if (function_exists("bcadd")) {
            $this->_amount = bcadd($this->amount, $other->amount);
        } else {
            $this->setAmount(
                ((float)$this->amount + (float)$other->amount)
            );
        }

        return $this;
    }

    /**
     * TODO: добавить проверки когда отключена bcadd
     *
     * @param Money $other
     * @return $this
     */
    public function sub(self $other)
    {
        if (function_exists("bcsub")) {
            $this->_amount = bcsub($this->amount, $other->amount);
        } else {
            $this->setAmount(
                ((float)$this->amount - (float)$other->amount)
            );
        }

        return $this;
    }
}