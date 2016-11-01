<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = $model->service_id;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->service_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->service_id], [
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
            // 'service_id',
            'creditor.creditor',
            'service',
            'service_date',
            'serviceStatus.service_status',
            'units',
            'discount',
            'total_cost',
            'notes:ntext',
            'record_status',
            // 'create_date',
            // 'create_user_id',
            // 'update_date',
            // 'update_user_id',
        ],
    ]) ?>

    <?= Yii::$app->controller->renderPartial('@app/views/service-item/index',[
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => $model->getServiceItems(),
                'pagination' => false
                ]),
        ]);
        ?>

</div>
