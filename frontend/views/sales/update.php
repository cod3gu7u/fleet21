<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */

$this->title = 'Update Sales: ' . ' ' . $model->sales_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sales_id, 'url' => ['view', 'id' => $model->sales_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
    <div class="btn-group" role="group">
        <?= Html::a('<i class="glyphicon glyphicon-print"></i>', ['report', 'id' => $model->sales_id],
        		[	'class' => 'btn btn-info',
        			'id' => 'report_btn',
        			'target'=> '_blank',
        			'title'=> Yii::t('app', 'Print Report'),]) ?>
        <?php if(\Yii::$app->user->can('admin')):?>
        <?= Html::a('<i class="glyphicon glyphicon-share"></i>', ['repay', 'id' => $model->sales_id],
        		[	'class' => 'btn btn-primary',
        			'id' => 'repay-btn',
        			// 'target'=> '_blank', 
        			'title'=> Yii::t('app', 'Repay Excess Amount'),]) ?>
        <?= Html::a('<i class="glyphicon glyphicon-transfer"></i>', ['vehicle-exchange/create', 'id' => $model->sales_id],
        		[	'class' => 'btn btn-warning showModalButton',
        			'id' => 'vehicle-exchange-btn',
        			'title'=> Yii::t('app', 'Exchange'),]) ?>
    	<?= Html::a('<i class="glyphicon glyphicon-import"></i>', ['return', 'id' => $model->sales_id],
    			[	'class' => 'btn btn-danger',
    				'id' => 'return-btn',
    				'title'=> Yii::t('app', 'Return'),]) ?>
        <?php endif?>
    </div>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

$this->registerJs("
	// hide all buttons
	$('#repay-btn, #vehicle-exchange-btn, #return-btn').hide();
	// if record is active show the buttons
	if($('#sales-record_status option:selected').val() == 'active'){
		$('#vehicle-exchange-btn, #return-btn').show();
	}
	// Enable repayment of excess amount if there's one
	if($('#sales-balance').val() < 0){
		$('#repay-btn').show();
	}
");
?>
