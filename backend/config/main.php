<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'homeUrl' => '/admin',
    'modules' => [
        // Configuration Yii2-User Backend //
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'enableRegistration' => true,
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin', 'alex']
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],*/
        // Configuration Yii2-User Backend //
        'user' => [
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_backendIdentity',
                'path' => '/admin',
                'httpOnly' => true,
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //'' => 'site/index',
                '<controller>' => '<controller>/index',
                '<controller>/<id:\d+>' => '<controller>/view',
                //'<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ]
        ],

    ],
    'params' => $params,
];
