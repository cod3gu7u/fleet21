<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\mpdf\Pdf;
use app\models\JournalSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Batches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        // get the posts in the current page
        $batches = $dataProvider->getModels();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'headerOptions' => ['width' => '10%',],
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new JournalSearch();
                    $searchModel->batch_id = $model->batch_id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('@app/views/journal/index',[
                        'model' => $searchModel,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],
            // ['class' => 'yii\grid\SerialColumn'],

            // 'batch_id',
            'batch_name',
            'batch_date',

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
                            'class'=>'btn btn-success showModalButton', 
                            'title'=> Yii::t('app', 'Create Batch'),

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
        // 'showPageSummary' => true,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>'Batches',
        ],
        'persistResize'=>false,
        'exportConfig' => [
            GridView::CSV => ['label' => 'Save as CSV'],
            GridView::HTML => ['label' => 'Save as HTML'],
            ],
    ]); ?>

</div>
