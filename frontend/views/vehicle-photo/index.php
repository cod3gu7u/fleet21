<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiclePhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Photos';
$this->params['breadcrumbs'][] = $this->title;
$vehicle = $dataProvider->getModels();
?>
<div class="vehicle-photo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create -Vehicle Photo', ['vehicle-photo/create', 'id'=>'1'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vehicle_photo_id',
            'vehicle_id',
            'photograph',
            'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
