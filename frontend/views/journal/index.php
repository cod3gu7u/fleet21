<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JournalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journals';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Journal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'journal_id',
            'batch.batch_name',
            'journalType.journal_type',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {void} ',
                'buttons' => [
                    'void' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                            'title' => Yii::t('app', 'Void'),
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'void') {
                        $url = '/journal/void?id=' . $model->journal_id; // your own url generation logic
                        return $url;
                    }
                    if ($action === 'view') {
                        $url = '/journal/view?id=' . $model->journal_id; // your own url generation logic
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = '/journal/update?id=' . $model->journal_id; // your own url generation logic
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>

</div>
