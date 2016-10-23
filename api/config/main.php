<?php

$params = array_merge(
        // require(__DIR__ . '/../../common/config/params.php'),
        //require(__DIR__ . '/../../common/config/params-local.php'),
        require(__DIR__ . '/params.php')
        //require(__DIR__ . '/params-local.php')
);

return [
    'id'         => 'runmile-api',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'modules'    => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class'    => 'api\modules\v1\Module'
        ]
    ],
    'components' => [
        'user'       => [
            'identityClass'   => 'api\modules\v1\models\ApiUserIdentity',
            'enableAutoLogin' => false,
            'loginUrl' =>'',
            'enableSession' => false,
        ],
         
        'request'    => [
            'enableCookieValidation' => false,
            'enableCsrfValidation'   => false,
            //'cookieValidationKey' => 'xxxxxxx',
            'parsers'                => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'on beforeSend' => function ($event) 
            {
                 $response = $event->sender;
                 return $response;
            }
        ],

        'log'        => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => true,
            'showScriptName'      => false,
            'rules'               => require('url_rules.php'),
        ]
    ],

    
    'params'     => $params,
];