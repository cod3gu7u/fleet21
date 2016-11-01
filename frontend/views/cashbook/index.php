<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CashbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Book Transaction';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="cashbook-index">
    <div class="cashbook-header">
    <label class="control-label" for="bank_id">Bank</label>
    <?php
        echo Select2::widget([
            'name' => 'bank',
            'value' => '',
            'data' => $searchModel->bankList,
            'options' => [
                'placeholder' => 'Select Bank ...',
                'onchange'=>'
                    $.pjax.reload({
                        url: "'.Url::to(['index']).'?CashbookSearch[bank_id]="+$(this).val(),
                        container: "#w1",
                        timeout: 1000,
                    });
                '
                ],
        ]);
    ?>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<?php
    $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    // [
    //     'attribute' => 'bank_id',
    //     'value'=>function($model,$key,$index,$widget) { 
    //         return $model->bank->bank; 
    //     },
    //     'filterType'=>GridView::FILTER_SELECT2,
    //     'filter'=>$searchModel->bankList,
    //     // 'filter'=>\app\models\Cashbook::getBankList(),
    //     'filterWidgetOptions'=>[
    //         'pluginOptions'=>['allowClear'=>true],
    //     ],
    //     'filterInputOptions'=>['placeholder'=>'Bank...'],
    //     'format'=>'raw'
    // ],
    // [
    //     'attribute'=>'accounting_period_id',
    //     'value'=>'accountingPeriod.accounting_period',
    // ],
    [
        'attribute'=>'transaction_date',
    ],
    [
        'attribute'=>'transaction_type_id',
        'value'=>function($model,$key,$index,$widget) { 
            return $model->transactionType->transaction_type; 
        },
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>$searchModel->transactionTypeList,
        'filterWidgetOptions'=>[
            'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Transaction Type...'],
        'format'=>'raw'
    ],
    [
        'attribute'=>'account_id',
        'value'=>'account.account_name',
    ],
    [
        'attribute' => 'exclusive_amount',
        'value' => function($model){
            if($model->transaction_type_id == 1)
                return $model->exclusive_amount*-1;
            else
                return $model->exclusive_amount;
        },
        'pageSummary' => true,
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'format'=>['decimal',2],
    ],
    // [
    //     'attribute' => 'tax_amount',
    //     'pageSummary' => true,
    //     'hAlign'=>'right',
    //     'vAlign'=>'middle',
    //     'format'=>['decimal',2],
    // ],
    [
        'attribute' => 'total_amount',
        'format'=>['decimal',2],
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'pageSummary' => true,
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => true,
        'vAlign'=>'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url ='/cashbook/view?id=' . $key; // your own url generation logic
                    return $url;
                }
                if ($action === 'update') {
                    $url ='/cashbook/update?id=' . $key ; // your own url generation logic
                    return $url;
                }
            },
        'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip', 'class'=>'showModalButton'],
        'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip', 'class'=>'showModalButton'],
        'deleteOptions'=>['title'=>$deleteMsg, 'data-toggle'=>'tooltip'], 
    ],
    ['class' => 'kartik\grid\CheckboxColumn']
];

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'showPageSummary' => true,
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    'beforeHeader'=>[
        [
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
                        'title'=> Yii::t('app', 'New Cashbook Entry'),

                    ]) . ' '.
                Html::a('<i class="glyphicon glyphicon-print"></i>', 
                    ['list-report'], 
                    [
                        'id' => 'report',
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
        'heading' => '<h3 class="panel-title"><i class="fa fa-money"></i> Cashbook </h3>',
    ],
]);
?>

</div>
