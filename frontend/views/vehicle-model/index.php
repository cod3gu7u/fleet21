<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vehicle Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            [
                'attribute' => 'vehicle_make_id',
                'value'=>'vehicleMake.make',
                'filter' => \app\models\VehicleMake::getVehicleMakeList(),
            ],
            // [
            //     'attribute' => 'model',
            //     'value'=>'model',
            //     'filter' => \app\models\VehicleModel::getVehicleModelList(),
            // ],
            'model',
            'year',
            'notes:ntext',
            // 'record_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
