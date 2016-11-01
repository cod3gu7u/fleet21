<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IssueInventory */

$this->title = 'Create Issue Inventory';
$this->params['breadcrumbs'][] = ['label' => 'Issue Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-inventory-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php
$this->registerJs("
	$('#issueinventory-vehicle_id').on('change',function(){
		var vehicle_id = $(this).val();
		$.ajax({
		   url: '/vehicle/get-vehicle-details',
		   data: {id: vehicle_id},
		   success: function(data) {
			   // process data
			   var data = $.parseJSON(data);
		   	   var details = 'Ref: ' + data.reference_number + ' ; Chassis : ' + data.chassis;
		   	   $('#issueinventory-vehicle_details').val(details);
		   }
		});
	});

"); 
?>
