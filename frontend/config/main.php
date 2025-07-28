<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'intranet-frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'onto_360',
            'csrfParam' => '_onto_CSRF_frontend',
        ],
        'user' => [
            'identityClass' => 'backend\modules\seguridad\models\Usuario',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
            'identityCookie' => ['name' => '_intranet-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'savePath' => __DIR__ . '/../runtime', // a temporary folder on frontend
            'name' => 'advanced-frontend',
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
            ],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@frontend/themes/pages',
                'baseUrl' => '../themes/pages',
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/pages/views',
                ],
            ],
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'localhost',  // ej. smtp.mandrillapp.com o smtp.gmail.com
                'username' => 'intranetadmin',
                'password' => 'intranetadmin',
                'port' => '25', // El puerto 25 es un puerto común también

            ],
        ]
    ],
    'params' => $params,
];
