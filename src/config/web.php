<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
return [
    'components' => [
        'backendAdmin' => [
            'menu' => [
                'data' => [

                    'settings' => [
                        'items' => [
                            [
                                "name"  => ['skeeks/money', 'Currencies'],
                                "url"   => ["money/admin-currency"],
                                "image" => ['\skeeks\cms\money\assets\Asset', 'images/money_16_16.png'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'modules' => [
        'money' => [
            'class' => 'skeeks\cms\money\ModuleMoney',
        ],
    ],
];