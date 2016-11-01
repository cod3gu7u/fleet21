<?php
return [
    'name' => 'SKYMOUSE FLEET-21',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'aliases' => [
        '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'right-menu', // defaults to null, using the application's layout without the menu
                                      // other avaliable values are 'right-menu' and 'top-menu'
            'mainLayout' => '@app/views/layouts/main.php',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'common\models\User',
                    'idField' => 'id'
                    ],
                // 'other' => [
                //     'class' => 'path\to\OtherController', // add another controller
                // ],
            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grant Access' // change label
                ],
                // 'route' => null, // disable menu
            ],
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'admin/site/logout' => 'site/logout',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/login',
            'site/error',
            // '*',
            // 'site/*',
            // 'admin/*',
            'vehicle/catalog',
            // 'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ],
    ],
];
