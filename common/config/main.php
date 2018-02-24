<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'i18n' => [
            'translations' => [
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages/common',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'common' => 'common.php',
                        'common/position' => 'position.php',
                    ],
                ],
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages/frontend',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'frontend' => 'frontend.php',
                        'frontend/employee' => 'employee.php',
                    ],
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages/backend',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'backend' => 'backend.php',
                        'backend/employee' => 'employee.php',
                    ],
                ],
            ],
        ],
    ],
];
