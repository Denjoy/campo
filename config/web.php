<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name'=> 'Campo',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'container' => [
        'definitions' => [
            'dosamigos\ckeditor\CKEditor' => [
                'preset' => 'full',
                'clientOptions' => [
                    'filebrowserImageUploadUrl' => '/files/upload'
                ]
            ]
        ],
    ],
    'language' => 'en',
    'sourceLanguage' => 'en',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'c-LfEDOUMi2SQaBAlpZx5w308yoFZ7qw',
        ],
        'opengraph' => [
            'class' => 'fgh151\opengraph\OpenGraph',
        ],
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '1281253643:AAHOopfq99o6A7SRaLjqUhgrQJeAXnnmvaM',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            'class' => abcms\multilanguage\UrlManager::className(),
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<lang:\w{2}>/<controller>/<action>/' => '<controller>/<action>',
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
