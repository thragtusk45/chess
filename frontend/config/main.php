<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'chess' => [
            'class' => 'frontend\modules\chess\Chess',
        ],
        'game' => [
            'class' => 'frontend\modules\game\Game',
        ],
    ] ,
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'rules' => [
                '' => 'site/index',
                '<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                '<_m>/' => '<_m>/default/index',
                '<_m>/<_c>/' => '<_m>/<_c>/index',
                '<_c>/<_a>' => '<_c>/<_a>',
                'chess/default/index' => 'chess/default/index',
            ]
        ],
    ],
    'params' => $params,
];
