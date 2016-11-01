<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\VehicleCostingSearch;
use yii\helpers\ArrayHelper;
use app\models\StockStatus;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerJsFile(
    '@web/frontend/assets/js/script.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
    );

$this->title = 'Vehicles';
$this->params['breadcrumbs'][] = $this->title;
?>
    
    <h3><?= Html::encode($this->title) ?></h3>

<p>
<?= $this->render('_search', ['model' => $searchModel]); ?>
</p>


<div class="vehicle-index">

<?php
    $gridColumns = [
    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'headerOptions' => ['width' => '10%',],
        'value' => function($model, $key, $index, $column){
            return GridView::ROW_COLLAPSED;
        },
        'detail' => function($model, $key, $index, $column){
            return Yii::$app->controller->renderPartial('view',[
                        'model' => $model,
                    ]);
        },
    ],
    ['class' => 'kartik\grid\SerialColumn'],

    'reference_number',
    // [
    //     'attribute'=>'location_id',
    //     'value'=>'location.location',
    // ],
    [
        'attribute'=>'make_id',
        'filter'=>\app\models\VehicleMake::getVehicleMakeList(),
        'value'=>'make.make',
    ],
        'vehicleType.vehicle_type',
        // 'model_id',
        'model_year',
    [
        'attribute'=>'chassis',
    ],
        'engine',
        'color.color',
        'capacity',
        'arrival_date',
    // [
    //     'attribute' => 'arrival_date',
    //     'format'=>'date',
    //     'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
    //     'filterWidgetOptions' => [
    //         'presetDropdown' => true,
    //         'pluginOptions' => [
    //             'format' => 'YYYY-MM-DD',
    //             'separator' => ' TO ',
    //             'opens'=>'left',
    //         ],
    //         'pluginEvents' => [
    //             "apply.daterangepicker" => "function() { apply_filter('date') }",
    //         ] 
    //     ],
    // ],
            'arrival_mileage',
    [
        'attribute' => 'stock_status',
        'value' => 'stockStatus.stock_status',
        'filter' => Html::activeDropDownList(
            $searchModel, 'stock_status', 
            // $model->stockStatusList,
            ArrayHelper::map(StockStatus::find()->asArray()->all(), 'stock_status_id', 'stock_status'),
            ['class'=>'form-control','prompt' => 'Stock Status']),
    ],
     'asking_price',

    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => true,
        'vAlign'=>'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url ='/vehicle/view?id=' . $key; // your own url generation logic
                    return $url;
                }
                if ($action === 'update') {
                    $url ='/vehicle/update?id=' . $key ; // your own url generation logic
                    return $url;
                }
            },
        'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip', 'target'=> '_blank',],
        'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip', 'target'=> '_blank',],
        'deleteOptions'=>['title'=>$deleteMsg, 'data-toggle'=>'tooltip'],
    ],
    ['class' => 'kartik\grid\CheckboxColumn']
];

$defaultExportConfig = [
    GridView::EXCEL => [
        'label' => 'Excel',
        'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
        'iconOptions' => ['class' => 'text-success'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => 'Skymouse Fleet21 Stock worksheet ' . date('Y-m-d H:i:s'),
        'alertMsg' => 'The EXCEL export file will be generated for download.',
        'options' => ['title' => 'Skymouse Fleet21 Stock Worksheet'],
        'mime' => 'application/vnd.ms-excel',
        'config' => [
            'worksheet' => ['ExportWorksheet'],
            'cssFile' => ''
        ]
    ],
    GridView::PDF => [
        'label' => 'PDF',
        'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
        'iconOptions' => ['class' => 'text-danger'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => 'Skymouse Fleet21 - Stock Report ' . date('Y-m-d H:i:s'),
        'alertMsg' => 'The PDF export file will be generated for download.',
        'options' => ['title' => 'Portable Document Format'],
        'mime' => 'application/pdf',
        'config' => [
            'mode' => 'c',
            'format' => 'A4-L',
            'destination' => 'D',
            'marginTop' => 20,
            'marginBottom' => 20,
            'cssInline' => '.kv-wrap{padding:20px;}' .
                '.kv-align-center{text-align:center;}' .
                '.kv-align-left{text-align:left;}' .
                '.kv-align-right{text-align:right;}' .
                '.kv-align-top{vertical-align:top!important;}' .
                '.kv-align-bottom{vertical-align:bottom!important;}' .
                '.kv-align-middle{vertical-align:middle!important;}' .
                '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
            'methods' => [
                'SetHeader' => [
                    ['odd' => $pdfHeader, 'even' => $pdfHeader]
                ],
                'SetFooter' => [
                    ['odd' => $pdfFooter, 'even' => $pdfFooter]
                ],
            ],
            'options' => [
                'title' => $title,
                'subject' => ['SKYMOUSE FLEET-21'],
                'keywords' => ['SKYMOUSE, FLEET-21, stock, vehicle, pdf'],
            ],
            'contentBefore'=>'',
            'contentAfter'=>''
        ]
    ],
];

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'exportConfig' => $defaultExportConfig,
    'showPageSummary' => true,
    // 'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    'beforeHeader'=>[
        [
            'columns'=>['{pager}'],
            'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],
    // set your toolbar
    'toolbar'=> [

            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>',
                    ['create'],
                    [
                        'data-pjax'=>0,
                        'class'=>'btn btn-success create',
                        'title'=> Yii::t('app', 'Create Vehicle'),

                    ]) . ' '.
                Html::a('<i class="glyphicon glyphicon-print"></i>',
                    ['list-report'],
                    [
                        'data-pjax'=>0,
                        'class'=>'btn btn-info',
                        'title'=> Yii::t('app', 'Print Report'),
                        'target'=> '_blank',
                    ]) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>',
                    ['index'],
                    [
                        'data-pjax'=>0,
                        'class'=>'btn btn-default',
                        'title'=> Yii::t('app', 'Reset Grid')
                    ])
            ],
            '{export}',
            '{toggleData}',
            'options'=>['class'=>'skip-export']
        ],
    'resizableColumns'=>true,
    'pjax' => true,
    'bordered' => false,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'floatHeaderOptions' => ['top' => $scrollingTop],
    'showPageSummary' => false,
    'pager' => [
        'firstPageLabel'=>'<<',
        'prevPageLabel'=>'<',
        'nextPageLabel'=>'>',
        'lastPageLabel'=>'>>',
    ],
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="fa fa-cab"></i> Vehicle</h3>',
    ],
]);
?>

</div>
