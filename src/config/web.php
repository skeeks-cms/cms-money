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
                                "name"    => ['skeeks/money', 'Currencies'],
                                "image"      => ['\skeeks\cms\money\assets\Asset', 'images/money_16_16.png'],
                                'priority' => 600,

                                'items' => [
                                    [
                                        "name" => ['skeeks/money', 'Currencies'],
                                        "url"   => ["money/admin-currency"],
                                        "image"   => ['\skeeks\cms\money\assets\Asset', 'images/money_16_16.png'],
                                    ],

                                    /*[
                                        "name"          => ['skeeks/money', 'Settings'],
                                        "url"            => [
                                            "cms/admin-settings",
                                            "component" => 'skeeks\cms\money\MoneyComponent',
                                        ],
                                        "image"            => ['skeeks\cms\assets\CmsAsset', 'images/icons/settings-big.png'],
                                        "activeCallback" => function ($adminMenuItem) {
                                            return (bool)(\Yii::$app->request->getUrl() == $adminMenuItem->getUrl());
                                        },
                                    ],*/
                                ],
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