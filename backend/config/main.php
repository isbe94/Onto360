<?php

/*Configuracion de la aplicacion backend*/
/*Generado by Pro Generator */
/*@author isbel  */


$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$modules = require(__DIR__ . '/modules.php');
$rules = require(__DIR__ . '/routes.php');
$config = [
    'id' => 'onto_360_backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'onto_360',
            'csrfParam' => '_onto_CSRF',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => $rules
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'onto_360-backend',
        ], 'user' => [
            'identityClass' => 'backend\modules\seguridad\models\Usuario',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
            'identityCookie' => [
                'name' => '_onto_360User', // unique for backend
                'path' => '/onto_360/web', // correct path for the backend app.
                'httpOnly' => true
            ]
        ],
        'view' => [
            'theme' => [
                'basePath' => '@backend/themes/make',
                'baseUrl' => '../themes/make',
                'pathMap' => [
                    '@backend/views' => '@backend/themes/make/views',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'localhost',  // ej. smtp.mandrillapp.com o smtp.gmail.com
                'username' => 'onto_360_admin',
                'password' => 'onto_360_admin',
                'port' => '25', // El puerto 25 es un puerto comun tambien
            ],
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
    'modules' => $modules
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /* $config['bootstrap'][] = 'debug';
     $config['modules']['debug'] = [
         'class' => 'yii\debug\Module',
     ];*/

//    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = [
//        'class' => 'yii\gii\Module',
//    ];
}
return $config;

?>
