<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */

$this->title = $model->purchase_order_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-print"></i> Report', ['report', 'id' => $model->purchase_order_id], ['class' => 'btn btn-info', 'target'=> '_blank',]) ?> 
        
        <?php if($model->order_status_id === \app\models\PurchaseOrder::POS_OPEN) : ?>
            <?php // echo Html::a('<i class="glyphicon glyphicon-check"></i> Convert to PV', ['convert-popv', 'id' => $model->purchase_order_id], ['class' => 'btn btn-success']); ?> 
            <?php // echo Html::a('Finalize', ['finalize', 'id' => $model->purchase_order_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Update', ['update', 'id' => $model->purchase_order_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->purchase_order_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>

        <?php if($model->order_status_id === \app\models\PurchaseOrder::POS_FINAL) : ?>
            <?= Html::a('Finalize', ['finalize', 'id' => $model->purchase_order_id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
    </p>

    <?=
        Yii::$app->controller->renderPartial('_view-header',['model' => $model,]);
    ?>
</div>

<div class="purchase-order-line-item-form">
<?= Yii::$app->controller->renderPartial('@app/views/purchase-order-line-item/index-view',[
                'purchase_order_id' => $model->purchase_order_id,
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getPurchaseOrderLineItems(),
                    'pagination' => false
                    ]),
            ]);
            ?>
</div>