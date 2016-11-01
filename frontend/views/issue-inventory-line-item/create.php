<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IssueInventoryLineItem */

$this->title = Yii::t('app', 'Create Issue Inventory Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Issue Inventory Line Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-inventory-line-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php
$this->registerJs("
	$('#issueinventorylineitem-barcode').on('change',function(){
    $.ajax({
	        url: '".yii\helpers\Url::toRoute("purchase-order-item/barcode")."',
	        dataType: 'json',
	        method: 'GET',
	        data: {id: $(this).val()},
	        success: function (data, textStatus, jqXHR) {
	            $('#issueinventorylineitem-purchase_order_item_id').val(data.purchase_order_item_id);
	            $('#issueinventorylineitem-product_name').val(data.purchase_order_item);
	        },
	        beforeSend: function (xhr) {
	            // alert('loading!');
	        },
	        error: function (jqXHR, textStatus, errorThrown) {
	            console.log('An error occured!');
	            alert('Error in ajax request');
	        }
	    });
	});

    // $('#issueinventorylineitem-purchase_order_item_id').prop('disabled', true);
    $('#issueinventorylineitem-product_name').prop('disabled', true);

	// Prevent barcode scanner from auto submitting the form.
	$(':input').keypress(function(event){
		        if (event.which == '10' || event.which == '13') {
		            event.preventDefault();
		        }
		    });

"); 
?>