<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Batch */

$this->title = $model->batch_id;
$this->params['breadcrumbs'][] = ['label' => 'Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->batch_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->batch_id], [
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
            'batch_id',
            'batch_name',
            'batch_date',
        ],
    ]) ?>

    <?php 
    echo GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getJournals(),
            'pagination' => false
            ]),
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'journal_id',
                'batch.batch_name',
                'journalType.journal_type',

            [
                'class' => yii\grid\ActionColumn::className(),
                'controller' => 'journal',
                'header' => '<i class="glyphicon glyphicon-plus"></i>&nbsp;Add New', 
                'template' => '{view}',
                'headerOptions' => ['width' => '10%', 'class' => 'showModalButton alert alert-info',
                    'value'=>Url::to(['journal/create', 'batch_id' => $model->batch_id]),],
                'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', 
                                Yii::$app->urlManager->createUrl(['/journal/view', 'id' => $model->batch_id ]),
                                [
                                'class' => 'showModalButton',
                                'title' => Yii::t('app', 'View Posting'),
                                'data-toggle' => 'modal',
                                'data-target' => '#modalContent',
                                'data-id' => $key,
                                'data-pjax' => '0',
                            ]);
                        }
                    ],
                ],
            ],
        ]); 
    ?>
</div>
