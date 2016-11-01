<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php
    $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        // 'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'customer_id',
        'value'=>'customer.customer_name',
        // 'pageSummary' => 'Page Total',
        // 'vAlign'=>'middle',
        // 'headerOptions'=>['class'=>'kv-sticky-column'],
        // 'contentOptions'=>['class'=>'kv-sticky-column'],
        // 'editableOptions'=>['header'=>'Name', 'size'=>'md']
    ],
    [
        // 'class' => 'kartik\grid\EditableColumn',
        'attribute'=>'vehicle_id',
        'value'=>'vehicle.reference_number',
    ],
            // 'salesPerson.sales_person',
            // 'sales_date',
        [
        'attribute' => 'sales_date',
        'format'=>'date',
        'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
        'filterWidgetOptions' => [
            'presetDropdown' => true,
            'pluginOptions' => [
                'format' => 'YYYY-MM-DD',
                'separator' => ' TO ',
                'opens'=>'left',
                ] ,
                'pluginEvents' => [
                    "apply.daterangepicker" => "function() { aplicarDateRangeFilter('date') }",
                ] 
            ],
        ],
        // [
        //     'attribute' => 'original_sales_amount',
        //     'pageSummary' => true,
        //     'hAlign'=>'right',
        //     'vAlign'=>'middle',
        //     'format'=>['decimal',2],
        // ],         
        // [
        //     'attribute' => 'discount_amount',
        //     'pageSummary' => true,
        //     'hAlign'=>'right',
        //     'vAlign'=>'middle',
        //     'format'=>['decimal',2],
        // ],        
        [
            'attribute' => 'final_sales_amount',
            'pageSummary' => true,
            'hAlign'=>'right',
            'vAlign'=>'middle',
            'format'=>['decimal',2],
        ],
        [
            'attribute' => 'paid_amount',
            'format'=>['decimal',2],
            'hAlign'=>'right',
            'vAlign'=>'middle',
            'pageSummary' => true,
        ],
        [
            'attribute' => 'balance',
            'pageSummary' => true,
            'hAlign'=>'right',
            'vAlign'=>'middle',
            'format'=>['decimal',2],
        ], 
    [
        'class'=>'kartik\grid\BooleanColumn',
        // 'class'=>'kartik\grid\DataColumn',
        // 'class'=>'\kartik\widgets\Switch',
        'attribute'=>'record_status',
        'vAlign'=>'middle',
        'filterType'=>GridView::FILTER_SWITCH,
        // 'filter'=>['active','inactive'],
        'value'=>function($model,$key,$index,$widget) {
                return ($model->record_status == 'active') ? true : false;
           },
        'filterWidgetOptions'=>[
            'pluginOptions'=>[
                        'onText'=>'<i class="glyphicon glyphicon-ok"></i>',
                        'offText'=>'<i class="glyphicon glyphicon-remove"></i>']
        ]
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => true,
        'vAlign'=>'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url ='/sales/view?id=' . $model->sales_id; // your own url generation logic
                    return $url;
                }
                if ($action === 'update') {
                    $url ='/sales/update?id=' . $model->sales_id ; // your own url generation logic
                    return $url;
                }
            },
        'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip', 'class'=>'showModalButton'],
        'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
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
        'filename' => 'Skymouse Fleet21 Sales worksheet ' . date('Y-m-d H:i:s'),
        'alertMsg' => 'The EXCEL export file will be generated for download.',
        'options' => ['title' => 'Skymouse Fleet21 Sales Worksheet'],
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
        'filename' => 'Skymouse Fleet21 - Sales Report ' . date('Y-m-d H:i:s'),
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
                'keywords' => ['SKYMOUSE, FLEET-21, sales, pdf'],
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
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    'beforeHeader'=>[
        [
            // 'columns'=>[
            //     ['content'=>'Header Before 1', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
            //     ['content'=>'Header Before 2', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
            //     ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
            // ],
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
                        'class'=>'btn btn-success',
                        'title'=> Yii::t('app', 'Create Sales'),

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
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
    'showPageSummary' => true,
    'pager' => [
        'firstPageLabel'=>'<<',
        'prevPageLabel'=>'<',
        'nextPageLabel'=>'>',
        'lastPageLabel'=>'>>',
    ],
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="fa fa-cart-plus"></i> Sales Records</h3>',
    ],
]);
?>


</div>


<script type="text/javascript">
function apply_filter() {

$('.grid-view').yiiGridView('applyFilter');

}
</script>