<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JournalTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journal Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Journal Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'journal_type_id',
            'journal_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
