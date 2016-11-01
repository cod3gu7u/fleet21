<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Standard Reports';

?>
<h3><?= Html::encode($this->title) ?></h3>

<div class="row">
  <div class="col-md-6">
	<div class="list-group">
  	    <?= Html::a('<i class="glyphicon glyphicon-user"> Customers</i>', ['#'],
			[	
			'class' => 'list-group-item active',
			]) ?>
  		<?= Html::a('<i class="glyphicon glyphicon-user"> All Customers</i>', ['/customer/list-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'All Customers'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-ok"> Customers (Settled)</i>', ['/sales/list-report', 'filter'=>'settled'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Customers (Settled)'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-upload"> Customers (Debtors)</i>', ['/sales/list-report', 'filter'=>'debtors'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Customers (Debtors)'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-eye-close"> Customers (Reserved)</i>', ['/sales/list-report', 'filter'=>'reserved'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Customers (Reserved)'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-download primary"> Customers (Liability)</i>', ['/sales/list-report', 'filter'=>'liability'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Liability Customers'),
			]) ?>			
	</div>
  </div>
  <div class="col-md-6">
	<div class="list-group">
	    <?= Html::a('<i class="fa fa-car"> Vehicles</i>', ['#'],
			[	
			'class' => 'list-group-item active',
			]) ?>

  		<?= Html::a('<i class="fa fa-car"> All Vehicles</i>', ['/vehicle/list-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'All Vehicles'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-time"> Arrival by Date</i>', 
  			['/reporting/input-form', 'controller_path' => 'vehicle/periodical-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Arrival by Date'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-ok"> Vehicles (Sold)</i>', ['/vehicle/list-report', 'filter'=>'sold'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Vehicles (Sold)'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-hand-right"> Vehicles (Reserved)</i>', ['/vehicle/list-report', 'filter'=>'reserved'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Vehicles (Reserved)'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-hand-left"> Vehicles (In Stock)</i>', ['/vehicle/list-report', 'filter'=>'instock'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'In Stock Vehicles'),
			]) ?>	

		<?= Html::a('<i class="glyphicon glyphicon-usd"> Vehicles Costing</i>', ['/reporting/input-form', 'controller_path' => '/vehicle-costing/list-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Vehicle Costing'),
			]) ?>
	</div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
	<div class="list-group">
		    <?= Html::a('<i class="glyphicon glyphicon-piggy-bank"> Sales</i>', ['#'],
			[	
			'class' => 'list-group-item active',
			]) ?>

  		<?= Html::a('<i class="glyphicon glyphicon-list-alt"> Sales Card</i>', 
  			['/reporting/input-form', 'controller_path' => 'sales/sales-card'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Sales Card'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-piggy-bank"> All Sales</i>', 
  			['/sales/periodical-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'All Sales'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-ok"> Daily</i>', 
  			['/reporting/input-form', 'controller_path' => 'sales/periodical-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Sales (Sold)'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-calendar"> Periodical</i>', 
  			['/reporting/input-form', 'controller_path' => 'sales/periodical-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Periodical'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-user"> Sales Person</i>', ['/sales/list-report', 'filter'=>'instock'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Sales Person'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-user"> Sales Person</i>', ['/sales/list-report', 'filter'=>'instock'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Sales Person'),
			]) ?>
	</div>
  </div>

  <div class="col-md-6">
	<div class="list-group">
		    <?= Html::a('<i class="fa fa-usd"> Financials</i>', ['#'],
			[	
			'class' => 'list-group-item active',
			]) ?>

  		<?= Html::a('<i class="glyphicon glyphicon-list-alt"> Profit and Loss</i>', 
  			['#'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Sales Card'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-piggy-bank"> Balance Sheet</i>', 
  			['#'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'All Sales'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-stats"> Cashflow</i>', 
  			['#', 'controller_path' => 'sales/periodical-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Sales (Sold)'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-calendar"> Periodical</i>', 
  			['#', 'controller_path' => 'sales/periodical-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Periodical'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-equalizer"> Retained Earnings</i>', ['#', 'filter'=>'instock'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Sales Person'),
			]) ?>

		<?= Html::a('<i class="glyphicon glyphicon-time"> End of Day</i>', 
  			['/reporting/input-form', 'controller_path' => 'reporting/day-end-report'],
			[	
			'class' => 'list-group-item ',
        	'target'=> '_blank',
			'title'=> Yii::t('app', 'Sales Person'),
			]) ?>
	</div>
  </div>

</div>
