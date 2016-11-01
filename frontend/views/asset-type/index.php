<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssetTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asset Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'asset_type_id',
            'asset_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
