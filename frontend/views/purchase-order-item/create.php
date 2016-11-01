<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderItem */

$this->title = 'Create Purchase Order Item';
$this->params['breadcrumbs'][] = ['label' => 'Purchase Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>

<?php
$this->registerJS(
	 "
	 $(':input').keypress(function(event){
	 	        if (event.which == '10' || event.which == '13') {
	 	            event.preventDefault();
	 	        }
	 	    });
 	"
	);
?>