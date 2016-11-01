<?php

use kartik\mpdf\Pdf;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-practical-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    // 'modules' => [
    //     'admin' => [
    //         'class' => 'mdm\admin\Module',
    //         'controllerMap' => [
    //              'assignment' => [
    //                 'class' => 'mdm\admin\controllers\AssignmentController',
    //                 'userClassName' => 'app\models\User', 
    //                 'idField' => 'id',
    //                 'usernameField' => 'username',
    //                 // 'fullnameField' => 'profile.full_name',
    //                 // 'extraColumns' => [
    //                 //     [
    //                 //         'attribute' => 'full_name',
    //                 //         'label' => 'Full Name',
    //                 //         'value' => function($model, $key, $index, $column) {
    //                 //             return $model->profile->full_name;
    //                 //         },
    //                 //     ],
    //                 //     [
    //                 //         'attribute' => 'dept_name',
    //                 //         'label' => 'Department',
    //                 //         'value' => function($model, $key, $index, $column) {
    //                 //             return $model->profile->dept->name;
    //                 //         },
    //                 //     ],
    //                 //     [
    //                 //         'attribute' => 'post_name',
    //                 //         'label' => 'Post',
    //                 //         'value' => function($model, $key, $index, $column) {
    //                 //             return $model->profile->post->name;
    //                 //         },
    //                 //     ],
    //                 // ],
    //                 'searchClass' => 'app\models\UserSearch'
    //             ],
    //         ],
    //         'layout' => 'top-menu', // defaults to null, using the application's layout without the menu
    //                                  // other avaliable values are 'right-menu' and 'top-menu'
    //         'mainLayout' => '@app/views/layouts/main.php',
    //         'menus' => [
    //             'assignment' => [
    //                 'label' => 'Grant Access' // change label
    //             ],
    //             'route' => null, // disable menu
    //         ],
    //     ],
    // ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            // 'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            // 'cssInline' => '.table{table-layout: fixed}',
            'mode' => Pdf::MODE_CORE, 
            // refer settings section for all configuration options
        ],
        'formatter' => [
            // 'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'P  ',
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
    ],
    'params' => $params,
];
