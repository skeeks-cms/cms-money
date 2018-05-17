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
     * @param Money $other
     * @return $this
     */
    public function add(self $other)
    {
        $other->convertToCurrency($this->currency);

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
     * @param Money $other
     * @return $this
     */
    public function sub(self $other)
    {
        $other->convertToCurrency($this->currency);

        if (function_exists("bcsub")) {
            $this->_amount = bcsub($this->amount, $other->amount);
        } else {
            $this->setAmount(
                ((float)$this->amount - (float)$other->amount)
            );
        }

        return $this;
    }

    /**
     * @param $number
     * @return $this
     */
    public function mul($number)
    {
        if (function_exists("bcmul")) {
            $this->_amount = bcsub($this->amount, (string) $number);
        } else {
            $this->setAmount(
                ((float)$this->amount * (float)$number)
            );
        }

        return $this;
    }


    /**
     * @param $currencyTo
     * @return $this
     */
    public function convertToCurrency($currencyTo)
    {
        $currencyTo = Currency::getInstance($currencyTo);
        $currency = $this->_currency;

        if ($crossCourse = $currency->getCrossCourse($currencyTo)) {
            $this->mul($crossCourse);
            $this->_currency = $currencyTo;
            return $this;
        } else {
            throw new InvalidArgumentException(\Yii::t('skeeks/money', 'Unable to get the cross rate for the currency') . ' ' . $currencyTo->code);
        }
    }
}