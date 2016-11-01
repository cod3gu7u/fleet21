<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */

$this->title = 'Update Purchase Order: ' . ' ' . $model->purchase_order_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchase_order_id, 'url' => ['view', 'id' => $model->purchase_order_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchase-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_view-header', [
        'model' => $model,
    ]) ?>

	<div class="purchase-order-line-item-form">
	<?= Yii::$app->controller->renderPartial('@app/views/purchase-order-line-item/index',[
	                'purchase_order_id' => $model->purchase_order_id,
	                'dataProvider' => new \yii\data\ActiveDataProvider([
	                    'query' => $model->getPurchaseOrderLineItems(),
	                    'pagination' => false
	                    ]),
	            ]);
	            ?>
	</div>

</div>

<?php
$this->registerJs("
 $('document').ready(function(){     
        // disable all form input fields
        $('#purchase-order-form-grid :input').prop('disabled', true);
        $('#w8 :input').prop('disabled', true);
    });        
"); 
?>