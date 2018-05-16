<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
return [
    'components' => [

        'i18n' => [
            'translations' => [
                'skeeks/money' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/money/messages',
                    'fileMap'  => [
                        'skeeks/money' => 'main.php',
                    ],
                ],

            ],
        ],

        'money' => [
            'class' => 'skeeks\cms\money\MoneyComponent',
        ],

        'formatter' => [
            'currencyCode' => 'RUB',
        ],

        'cmsAgent' => [
            'commands' => [
                'money/agents/update-courses' => [
                    'class'    => \skeeks\cms\agent\CmsAgent::class,
                    'name'     => ['skeeks/money', 'Updating currency rate'],
                    'interval' => 3600 * 12,
                ],
            ],
        ],
    ],
];