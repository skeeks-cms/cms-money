<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
return [
    'modules' => [
        'money' => [
            'class'               => 'skeeks\cms\money\ModuleMoney',
            'controllerNamespace' => 'skeeks\cms\money\console\controllers',
        ],
    ],
    
    'controllerMap' => [
        'migrate' => [
            'migrationPath' => [
                '@skeeks/cms/money/migrations',
            ],
        ],
    ]
];