<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\models\PostingSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Journal */

$this->title = $model->journal_id;
$this->params['breadcrumbs'][] = ['label' => 'Journals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-view">

    <h3>Journal : <?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Post Journal', ['post', 'id' => $model->journal_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->journal_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'journal_id',
            'batch.batch_name',
            'journalType.journal_type',
        ],
    ]) ?>


    <h3>Transactions</h3>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getPostings(),
            'pagination' => false
            ]),
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'headerOptions' => ['width' => '10%',],
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new PostingSearch();
                    $searchModel->journal_id = $model->journal_id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('@app/views/posting/index',[
                        'model' => $searchModel,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],
            // ['class' => 'yii\grid\SerialColumn'],
            // 'posting_sequence_id',
            'account.account_name',
            // 'journal.journal',
            'accountingPeriod.accounting_period',
            'assetType.asset_type',
            [
                'attribute' => 'quantity',
                'hAlign'=>'right',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'unit_amount',
                'hAlign'=>'right',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'total_amount',
                'pageSummary' => true,
                'hAlign'=>'right',
                'headerOptions'=>['class'=>'kv­sticky­column'],
                'contentOptions'=>['class'=>'kv­sticky­column'],
            ],
            // [
            //     'class' => '\kartik\grid\DataColumn',
            //     'attribute' => 'total_amount',
            //     'pageSummary' => 'Page Total',
            //     'hAlign'=>'right',
            //     'headerOptions'=>['class'=>'kv­sticky­column'],
            //     'contentOptions'=>['class'=>'kv­sticky­column'],
            //     // 'editableOptions'=>['header'=>'Name', 'size'=>'md']
            // ],
            // 'posting_status',
            // 'journal_owner_id',
            // 'posting_date',
            // 'posting_user_id',

            [
                'class' => 'kartik\grid\ActionColumn',
                'contentOptions' => ['width' => '80px;'],
                'pageSummary' => false,
                'dropdown' => true,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { return '#'; },
        'viewOptions'=>['title'=>$viewMsg, 'data­toggle'=>'tooltip'],
        'updateOptions'=>['title'=>$updateMsg, 'data­toggle'=>'tooltip'],
        'deleteOptions'=>['title'=>$deleteMsg, 'data­toggle'=>'tooltip'],
            ],
        ],

        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax'=>true, // pjax is set to always true for this demo
        'beforeHeader'=>[
                [
                    // 'columns'=>[
                        // ['content'=>'Faculty', 'options'=>['colspan'=>6, 'class'=>'text-center warning']], 
                        // ['content'=>'Header Before 2', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                        // ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
                    // ],
                    'options'=>['class'=>'skip-export'] // remove this row from export
                ]
            ],
        // set your toolbar
        'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', 
                        ['posting/create', 'journal_id' => $model->journal_id,], 
                        [
                            'data-pjax'=>0, 
                            'class'=>'btn btn-success', 
                            'title'=> Yii::t('app', 'Create New Entry'),

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
            ],
        // set export properties
        'export'=>[
            'fontAwesome'=>true
            ],

        'pjax' => true,
        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        // 'showPageSummary'=>true,
        'showPageSummary' => true,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>'Journal Transactions',
        ],
        'persistResize'=>false,
        'exportConfig' => [
            GridView::CSV => ['label' => 'Save as CSV'],
            GridView::HTML => ['label' => 'Save as HTML'],
            ],
    ]); ?>

</div>
