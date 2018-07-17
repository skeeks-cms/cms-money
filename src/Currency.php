<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money;

use skeeks\cms\money\models\MoneyCurrency;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

/**
 * @property MoneyCurrency $model
 *
 * @property string        $name
 * @property integer       numericCode
 * @property integer       defaultFractionDigits
 * @property integer       subUnit
 *
 * @property float         baseCourse
 *
 * new Currency('RUB');
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class Currency extends BaseObject
{
    /**
     * @var array
     */
    public static $currencies = [
        'AED' => [
            'name'                    => 'UAE Dirham',
            'numeric_code'            => 784,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'AFN' => [
            'name'                    => 'Afghani',
            'numeric_code'            => 971,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ALL' => [
            'name'                    => 'Lek',
            'numeric_code'            => 8,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'AMD' => [
            'name'                    => 'Armenian Dram',
            'numeric_code'            => 51,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ANG' => [
            'name'                    => 'Netherlands Antillean Guilder',
            'numeric_code'            => 532,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'AOA' => [
            'name'                    => 'Kwanza',
            'numeric_code'            => 973,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ARS' => [
            'name'                    => 'Argentine Peso',
            'numeric_code'            => 32,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'AUD' => [
            'name'                    => 'Australian Dollar',
            'numeric_code'            => 36,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'AWG' => [
            'name'                    => 'Aruban Florin',
            'numeric_code'            => 533,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'AZN' => [
            'name'                    => 'Azerbaijanian Manat',
            'numeric_code'            => 944,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BAM' => [
            'name'                    => 'Convertible Mark',
            'numeric_code'            => 977,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BBD' => [
            'name'                    => 'Barbados Dollar',
            'numeric_code'            => 52,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BDT' => [
            'name'                    => 'Taka',
            'numeric_code'            => 50,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BGN' => [
            'name'                    => 'Bulgarian Lev',
            'numeric_code'            => 975,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BHD' => [
            'name'                    => 'Bahraini Dinar',
            'numeric_code'            => 48,
            'default_fraction_digits' => 3,
            'sub_unit'                => 1000,
        ],
        'BIF' => [
            'name'                    => 'Burundi Franc',
            'numeric_code'            => 108,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'BMD' => [
            'name'                    => 'Bermudian Dollar',
            'numeric_code'            => 60,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BND' => [
            'name'                    => 'Brunei Dollar',
            'numeric_code'            => 96,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BOB' => [
            'name'                    => 'Boliviano',
            'numeric_code'            => 68,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BOV' => [
            'name'                    => 'Mvdol',
            'numeric_code'            => 984,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BRL' => [
            'name'                    => 'Brazilian Real',
            'numeric_code'            => 986,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BSD' => [
            'name'                    => 'Bahamian Dollar',
            'numeric_code'            => 44,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BTN' => [
            'name'                    => 'Ngultrum',
            'numeric_code'            => 64,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BWP' => [
            'name'                    => 'Pula',
            'numeric_code'            => 72,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'BYR' => [
            'name'                    => 'Belarussian Ruble',
            'numeric_code'            => 974,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'BZD' => [
            'name'                    => 'Belize Dollar',
            'numeric_code'            => 84,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CAD' => [
            'name'                    => 'Canadian Dollar',
            'numeric_code'            => 124,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CDF' => [
            'name'                    => 'Congolese Franc',
            'numeric_code'            => 976,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CHE' => [
            'name'                    => 'WIR Euro',
            'numeric_code'            => 947,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CHF' => [
            'name'                    => 'Swiss Franc',
            'numeric_code'            => 756,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CHW' => [
            'name'                    => 'WIR Franc',
            'numeric_code'            => 948,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CLF' => [
            'name'                    => 'Unidades de fomento',
            'numeric_code'            => 990,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'CLP' => [
            'name'                    => 'Chilean Peso',
            'numeric_code'            => 152,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'CNY' => [
            'name'                    => 'Yuan Renminbi',
            'numeric_code'            => 156,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'COP' => [
            'name'                    => 'Colombian Peso',
            'numeric_code'            => 170,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'COU' => [
            'name'                    => 'Unidad de Valor Real',
            'numeric_code'            => 970,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CRC' => [
            'name'                    => 'Costa Rican Colon',
            'numeric_code'            => 188,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CUC' => [
            'name'                    => 'Peso Convertible',
            'numeric_code'            => 931,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CUP' => [
            'name'                    => 'Cuban Peso',
            'numeric_code'            => 192,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CVE' => [
            'name'                    => 'Cape Verde Escudo',
            'numeric_code'            => 132,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'CZK' => [
            'name'                    => 'Czech Koruna',
            'numeric_code'            => 203,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'DJF' => [
            'name'                    => 'Djibouti Franc',
            'numeric_code'            => 262,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'DKK' => [
            'name'                    => 'Danish Krone',
            'numeric_code'            => 208,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'DOP' => [
            'name'                    => 'Dominican Peso',
            'numeric_code'            => 214,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'DZD' => [
            'name'                    => 'Algerian Dinar',
            'numeric_code'            => 12,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'EGP' => [
            'name'                    => 'Egyptian Pound',
            'numeric_code'            => 818,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ERN' => [
            'name'                    => 'Nakfa',
            'numeric_code'            => 232,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ETB' => [
            'name'                    => 'Ethiopian Birr',
            'numeric_code'            => 230,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'EUR' => [
            'name'                    => 'Euro',
            'numeric_code'            => 978,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'FJD' => [
            'name'                    => 'Fiji Dollar',
            'numeric_code'            => 242,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'FKP' => [
            'name'                    => 'Falkland Islands Pound',
            'numeric_code'            => 238,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'GBP' => [
            'name'                    => 'Pound Sterling',
            'numeric_code'            => 826,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'GEL' => [
            'name'                    => 'Lari',
            'numeric_code'            => 981,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'GHS' => [
            'name'                    => 'Ghana Cedi',
            'numeric_code'            => 936,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'GIP' => [
            'name'                    => 'Gibraltar Pound',
            'numeric_code'            => 292,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'GMD' => [
            'name'                    => 'Dalasi',
            'numeric_code'            => 270,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'GNF' => [
            'name'                    => 'Guinea Franc',
            'numeric_code'            => 324,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'GTQ' => [
            'name'                    => 'Quetzal',
            'numeric_code'            => 320,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'GYD' => [
            'name'                    => 'Guyana Dollar',
            'numeric_code'            => 328,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'HKD' => [
            'name'                    => 'Hong Kong Dollar',
            'numeric_code'            => 344,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'HNL' => [
            'name'                    => 'Lempira',
            'numeric_code'            => 340,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'HRK' => [
            'name'                    => 'Croatian Kuna',
            'numeric_code'            => 191,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'HTG' => [
            'name'                    => 'Gourde',
            'numeric_code'            => 332,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'HUF' => [
            'name'                    => 'Forint',
            'numeric_code'            => 348,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'IDR' => [
            'name'                    => 'Rupiah',
            'numeric_code'            => 360,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ILS' => [
            'name'                    => 'New Israeli Sheqel',
            'numeric_code'            => 376,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'INR' => [
            'name'                    => 'Indian Rupee',
            'numeric_code'            => 356,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'IQD' => [
            'name'                    => 'Iraqi Dinar',
            'numeric_code'            => 368,
            'default_fraction_digits' => 3,
            'sub_unit'                => 1000,
        ],
        'IRR' => [
            'name'                    => 'Iranian Rial',
            'numeric_code'            => 364,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ISK' => [
            'name'                    => 'Iceland Krona',
            'numeric_code'            => 352,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'JMD' => [
            'name'                    => 'Jamaican Dollar',
            'numeric_code'            => 388,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'JOD' => [
            'name'                    => 'Jordanian Dinar',
            'numeric_code'            => 400,
            'default_fraction_digits' => 3,
            'sub_unit'                => 100,
        ],
        'JPY' => [
            'name'                    => 'Yen',
            'numeric_code'            => 392,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'KES' => [
            'name'                    => 'Kenyan Shilling',
            'numeric_code'            => 404,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'KGS' => [
            'name'                    => 'Som',
            'numeric_code'            => 417,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'KHR' => [
            'name'                    => 'Riel',
            'numeric_code'            => 116,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'KMF' => [
            'name'                    => 'Comoro Franc',
            'numeric_code'            => 174,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'KPW' => [
            'name'                    => 'North Korean Won',
            'numeric_code'            => 408,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'KRW' => [
            'name'                    => 'Won',
            'numeric_code'            => 410,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'KWD' => [
            'name'                    => 'Kuwaiti Dinar',
            'numeric_code'            => 414,
            'default_fraction_digits' => 3,
            'sub_unit'                => 1000,
        ],
        'KYD' => [
            'name'                    => 'Cayman Islands Dollar',
            'numeric_code'            => 136,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'KZT' => [
            'name'                    => 'Tenge',
            'numeric_code'            => 398,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'LAK' => [
            'name'                    => 'Kip',
            'numeric_code'            => 418,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'LBP' => [
            'name'                    => 'Lebanese Pound',
            'numeric_code'            => 422,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'LKR' => [
            'name'                    => 'Sri Lanka Rupee',
            'numeric_code'            => 144,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'LRD' => [
            'name'                    => 'Liberian Dollar',
            'numeric_code'            => 430,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'LSL' => [
            'name'                    => 'Loti',
            'numeric_code'            => 426,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'LTL' => [
            'name'                    => 'Lithuanian Litas',
            'numeric_code'            => 440,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'LVL' => [
            'name'                    => 'Latvian Lats',
            'numeric_code'            => 428,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'LYD' => [
            'name'                    => 'Libyan Dinar',
            'numeric_code'            => 434,
            'default_fraction_digits' => 3,
            'sub_unit'                => 1000,
        ],
        'MAD' => [
            'name'                    => 'Moroccan Dirham',
            'numeric_code'            => 504,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MDL' => [
            'name'                    => 'Moldovan Leu',
            'numeric_code'            => 498,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MGA' => [
            'name'                    => 'Malagasy Ariary',
            'numeric_code'            => 969,
            'default_fraction_digits' => 2,
            'sub_unit'                => 5,
        ],
        'MKD' => [
            'name'                    => 'Denar',
            'numeric_code'            => 807,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MMK' => [
            'name'                    => 'Kyat',
            'numeric_code'            => 104,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MNT' => [
            'name'                    => 'Tugrik',
            'numeric_code'            => 496,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MOP' => [
            'name'                    => 'Pataca',
            'numeric_code'            => 446,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MRO' => [
            'name'                    => 'Ouguiya',
            'numeric_code'            => 478,
            'default_fraction_digits' => 2,
            'sub_unit'                => 5,
        ],
        'MUR' => [
            'name'                    => 'Mauritius Rupee',
            'numeric_code'            => 480,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MVR' => [
            'name'                    => 'Rufiyaa',
            'numeric_code'            => 462,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MWK' => [
            'name'                    => 'Kwacha',
            'numeric_code'            => 454,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MXN' => [
            'name'                    => 'Mexican Peso',
            'numeric_code'            => 484,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MXV' => [
            'name'                    => 'Mexican Unidad de Inversion (UDI)',
            'numeric_code'            => 979,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MYR' => [
            'name'                    => 'Malaysian Ringgit',
            'numeric_code'            => 458,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'MZN' => [
            'name'                    => 'Mozambique Metical',
            'numeric_code'            => 943,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'NAD' => [
            'name'                    => 'Namibia Dollar',
            'numeric_code'            => 516,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'NGN' => [
            'name'                    => 'Naira',
            'numeric_code'            => 566,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'NIO' => [
            'name'                    => 'Cordoba Oro',
            'numeric_code'            => 558,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'NOK' => [
            'name'                    => 'Norwegian Krone',
            'numeric_code'            => 578,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'NPR' => [
            'name'                    => 'Nepalese Rupee',
            'numeric_code'            => 524,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'NZD' => [
            'name'                    => 'New Zealand Dollar',
            'numeric_code'            => 554,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'OMR' => [
            'name'                    => 'Rial Omani',
            'numeric_code'            => 512,
            'default_fraction_digits' => 3,
            'sub_unit'                => 1000,
        ],
        'PAB' => [
            'name'                    => 'Balboa',
            'numeric_code'            => 590,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'PEN' => [
            'name'                    => 'Nuevo Sol',
            'numeric_code'            => 604,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'PGK' => [
            'name'                    => 'Kina',
            'numeric_code'            => 598,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'PHP' => [
            'name'                    => 'Philippine Peso',
            'numeric_code'            => 608,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'PKR' => [
            'name'                    => 'Pakistan Rupee',
            'numeric_code'            => 586,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'PLN' => [
            'name'                    => 'Zloty',
            'numeric_code'            => 985,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'PYG' => [
            'name'                    => 'Guarani',
            'numeric_code'            => 600,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'QAR' => [
            'name'                    => 'Qatari Rial',
            'numeric_code'            => 634,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'RON' => [
            'name'                    => 'New Romanian Leu',
            'numeric_code'            => 946,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'RSD' => [
            'name'                    => 'Serbian Dinar',
            'numeric_code'            => 941,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'RUB' => [
            'name'                    => 'Russian Ruble',
            'numeric_code'            => 643,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'RWF' => [
            'name'                    => 'Rwanda Franc',
            'numeric_code'            => 646,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'SAR' => [
            'name'                    => 'Saudi Riyal',
            'numeric_code'            => 682,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SBD' => [
            'name'                    => 'Solomon Islands Dollar',
            'numeric_code'            => 90,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SCR' => [
            'name'                    => 'Seychelles Rupee',
            'numeric_code'            => 690,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SDG' => [
            'name'                    => 'Sudanese Pound',
            'numeric_code'            => 938,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SEK' => [
            'name'                    => 'Swedish Krona',
            'numeric_code'            => 752,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SGD' => [
            'name'                    => 'Singapore Dollar',
            'numeric_code'            => 702,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SHP' => [
            'name'                    => 'Saint Helena Pound',
            'numeric_code'            => 654,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SLL' => [
            'name'                    => 'Leone',
            'numeric_code'            => 694,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SOS' => [
            'name'                    => 'Somali Shilling',
            'numeric_code'            => 706,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SRD' => [
            'name'                    => 'Surinam Dollar',
            'numeric_code'            => 968,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SSP' => [
            'name'                    => 'South Sudanese Pound',
            'numeric_code'            => 728,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'STD' => [
            'name'                    => 'Dobra',
            'numeric_code'            => 678,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SVC' => [
            'name'                    => 'El Salvador Colon',
            'numeric_code'            => 222,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SYP' => [
            'name'                    => 'Syrian Pound',
            'numeric_code'            => 760,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'SZL' => [
            'name'                    => 'Lilangeni',
            'numeric_code'            => 748,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'THB' => [
            'name'                    => 'Baht',
            'numeric_code'            => 764,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'TJS' => [
            'name'                    => 'Somoni',
            'numeric_code'            => 972,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'TMT' => [
            'name'                    => 'Turkmenistan New Manat',
            'numeric_code'            => 934,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'TND' => [
            'name'                    => 'Tunisian Dinar',
            'numeric_code'            => 788,
            'default_fraction_digits' => 3,
            'sub_unit'                => 1000,
        ],
        'TOP' => [
            'name'                    => 'Pa’anga',
            'numeric_code'            => 776,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'TRY' => [
            'name'                    => 'Turkish Lira',
            'numeric_code'            => 949,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'TTD' => [
            'name'                    => 'Trinidad and Tobago Dollar',
            'numeric_code'            => 780,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'TWD' => [
            'name'                    => 'New Taiwan Dollar',
            'numeric_code'            => 901,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'TZS' => [
            'name'                    => 'Tanzanian Shilling',
            'numeric_code'            => 834,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'UAH' => [
            'name'                    => 'Hryvnia',
            'numeric_code'            => 980,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'UGX' => [
            'name'                    => 'Uganda Shilling',
            'numeric_code'            => 800,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'USD' => [
            'name'                    => 'US Dollar',
            'numeric_code'            => 840,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'USN' => [
            'name'                    => 'US Dollar (Next day)',
            'numeric_code'            => 997,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'USS' => [
            'name'                    => 'US Dollar (Same day)',
            'numeric_code'            => 998,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'UYI' => [
            'name'                    => 'Uruguay Peso en Unidades Indexadas (URUIURUI)',
            'numeric_code'            => 940,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'UYU' => [
            'name'                    => 'Peso Uruguayo',
            'numeric_code'            => 858,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'UZS' => [
            'name'                    => 'Uzbekistan Sum',
            'numeric_code'            => 860,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'VEF' => [
            'name'                    => 'Bolivar',
            'numeric_code'            => 937,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'VND' => [
            'name'                    => 'Dong',
            'numeric_code'            => 704,
            'default_fraction_digits' => 0,
            'sub_unit'                => 10,
        ],
        'VUV' => [
            'name'                    => 'Vatu',
            'numeric_code'            => 548,
            'default_fraction_digits' => 0,
            'sub_unit'                => 1,
        ],
        'WST' => [
            'name'                    => 'Tala',
            'numeric_code'            => 882,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'XAF' => [
            'name'                    => 'CFA Franc BEAC',
            'numeric_code'            => 950,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XAG' => [
            'name'                    => 'Silver',
            'numeric_code'            => 961,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XAU' => [
            'name'                    => 'Gold',
            'numeric_code'            => 959,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XBA' => [
            'name'                    => 'Bond Markets Unit European Composite Unit (EURCO)',
            'numeric_code'            => 955,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XBB' => [
            'name'                    => 'Bond Markets Unit European Monetary Unit (E.M.U.-6)',
            'numeric_code'            => 956,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XBC' => [
            'name'                    => 'Bond Markets Unit European Unit of Account 9 (E.U.A.-9)',
            'numeric_code'            => 957,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XBD' => [
            'name'                    => 'Bond Markets Unit European Unit of Account 17 (E.U.A.-17)',
            'numeric_code'            => 958,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XCD' => [
            'name'                    => 'East Caribbean Dollar',
            'numeric_code'            => 951,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'XDR' => [
            'name'                    => 'SDR (Special Drawing Right)',
            'numeric_code'            => 960,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XFU' => [
            'name'                    => 'UIC-Franc',
            'numeric_code'            => 958,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XOF' => [
            'name'                    => 'CFA Franc BCEAO',
            'numeric_code'            => 952,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XPD' => [
            'name'                    => 'Palladium',
            'numeric_code'            => 964,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XPF' => [
            'name'                    => 'CFP Franc',
            'numeric_code'            => 953,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XPT' => [
            'name'                    => 'Platinum',
            'numeric_code'            => 962,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XSU' => [
            'name'                    => 'Sucre',
            'numeric_code'            => 994,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XTS' => [
            'name'                    => 'Codes specifically reserved for testing purposes',
            'numeric_code'            => 963,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XUA' => [
            'name'                    => 'ADB Unit of Account',
            'numeric_code'            => 965,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'XXX' => [
            'name'                    => 'The codes assigned for transactions where no currency is involved',
            'numeric_code'            => 999,
            'default_fraction_digits' => 0,
            'sub_unit'                => 100,
        ],
        'YER' => [
            'name'                    => 'Yemeni Rial',
            'numeric_code'            => 886,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ZAR' => [
            'name'                    => 'Rand',
            'numeric_code'            => 710,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ZMW' => [
            'name'                    => 'Zambian Kwacha',
            'numeric_code'            => 967,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
        'ZWL' => [
            'name'                    => 'Zimbabwe Dollar',
            'numeric_code'            => 932,
            'default_fraction_digits' => 2,
            'sub_unit'                => 100,
        ],
    ];
    /**
     * @var static[]
     */
    static public $registeredCurrency = [];
    /**
     * @var string
     */
    public $code;

    /**
     * @var array
     */
    protected $_baseData = [];
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
        $currenciesData = \Yii::$app->money->baseCurrenciesData;

        if (isset($currenciesData[$this->code])) {
            $this->_baseData = $currenciesData[$this->code];
            /*if (is_array($data)) {
                foreach ($data as $key => $value) {
                    if ($this->canSetProperty($key)) {
                        $this->{$key} = $value;
                    }
                }
            }*/
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
        if ($currency instanceof Currency) {
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

    /**
     * @return MoneyCurrency
     */
    public function getModel()
    {
        return MoneyCurrency::getByCode($this->code);
    }

    /**
     * @return string
     */
    public function getName()
    {
        if ($this->model) {
            return (string)$this->model->name;
        }

        return (string)ArrayHelper::getValue($this->_baseData, 'name', $this->code);
    }

    /**
     * @return int
     */
    public function getNumericCode()
    {
        if ($this->model) {
            return (integer)$this->model->numeric_code;
        }

        return (integer)ArrayHelper::getValue($this->_baseData, 'numeric_code');
    }

    /**
     * @return int
     */
    public function getDefaultFractionDigits()
    {
        if ($this->model) {
            return (integer)$this->model->default_fraction_digits;
        }

        return (integer)ArrayHelper::getValue($this->_baseData, 'default_fraction_digits');
    }

    /**
     * @return int
     */
    public function getSubUnit()
    {
        if ($this->model) {
            //return (integer)$this->model->sub_unit;
        }

        return (integer) ArrayHelper::getValue($this->_baseData, 'sub_unit');
    }

    /**
     * @return int
     */
    public function getBaseCourse()
    {
        if ($this->model) {
            return (float)$this->model->course;
        }

        return (float)ArrayHelper::getValue($this->_baseData, 'base_course', 1);
    }

    /**
     * Обратный курс по отношению к другой валюте
     *
     * @param Currency|string $currencyTo
     * @return float|null
     */
    public function getCrossCourse($currencyTo)
    {
        if ($this->isSame($currencyTo)) {
            return 1;
        }

        $currencyTo = static::getInstance($currencyTo);

        if ($this->baseCourse && $currencyTo->baseCourse) {
            return $this->baseCourse / $currencyTo->baseCourse;
        }

        return 1;
    }


    /**
     * @return array|string
     * @deprecated
     */
    public function getCurrencyCode()
    {
        return $this->code;
    }
}