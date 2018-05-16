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
 * new Currency('RUB');
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class Currency extends BaseObject
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $name;

    /**
     * @var integer
     */
    public $numeric_code;

    /**
     * @var integer
     */
    public $default_fraction_digits;

    /**
     * @var integer
     */
    public $sub_unit;

    /**
     * @var int
     */
    public $course = 1;


    /**
     * @var static[]
     */
    static public $registeredCurrency = [];

    /**
     * Currency constructor.
     * @param array $code
     * @param array $options
     */
    public function __construct($code, $options = [])
    {
        $this->code = $code;

        parent::__construct($options);
    }

    public function init()
    {
        if (isset(static::$currencies[$this->code])) {
            $data = static::$currencies[$this->code];
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    if ($this->canSetProperty($key)) {
                        $this->{$key} = $value;
                    }
                }
            }
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->code;
    }

    /**
     * @param string|static $currency
     * @return bool
     */
    public function isSame($currency)
    {
        $currency = static::getInstance($currency);
        return (bool)($currency->code == $this->code);
    }

    /**
     * @param sting|static $currency
     * @return Currency|static
     */
    static public function getInstance($currency)
    {
        if ($currency instanceof $currency) {
            return $currency;
        }

        if (!is_string($currency)) {
            throw new \InvalidArgumentException('$currency must be an object of type Currency or a string');
        }

        if (isset(static::$registeredCurrency[$currency])) {
            return static::$registeredCurrency[$currency];
        } else {
            $currency = new static($currency);
            static::$registeredCurrency[$currency->code] = $currency;
            return $currency;
        }

        return $currency;
    }

}