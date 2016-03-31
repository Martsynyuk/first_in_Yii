<?php

$params = require(__DIR__ . '/params.php');

const ROWLIMIT = 5; // count of displaying contact
const MAXBUTTONCOUNT = 5; // limit of pagination button

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'lolo',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
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
    		'assetManager' => [
    				'bundles' => [
    						'yii\web\JqueryAsset' => [
    								'sourcePath' => null,
    								'js' => ['/js/jquery.cookie.js'] 
    						],
    				],
    			],
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        		'enableStrictParsing' => false,
            'rules' => [
            		'/contacts/index/<page:\d+>' => '/contacts/index/',
            		'/contacts/select/<page:\d+>' => '/contacts/select/',
            		'/contacts/edit/<id:\d+>' => '/contacts/edit/',
            		'/contacts/view/<id:\d+>' => '/contacts/view/',
            		'/contacts/delete/<id:\d+>' => '/contacts/delete/',
            		'/' => '/contacts/index'
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
   	$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
