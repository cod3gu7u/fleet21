
<?php
use \fruppel\googlecharts\GoogleCharts;
use scotthuangzl\googlechart\GoogleChart;
//use miloschuman\highcharts\Highcharts;
//use yii\web\JsExpression;
use miloschuman\highcharts\Highstock;
use yii\helpers\Html;

$this->title = 'Business Intelligence';
$this->params['breadcrumbs'][] = ['label' => 'Reporting', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="dashboard">
	<h3><?= Html::encode($this->title) ?></h3>

	<?= $this->render('_dashboard', [
	        'make' => $make,
	        'type' => $type,
	        'salesByType' => $salesByType,
			'monthsArray' => $monthsArray,
			'salesPerDay' => $salesPerDay,
			'salesPerMonth' => $salesPerMonth,
			'vehiclesByStockStatus' => $vehiclesByStockStatus,
			'salesTransanctionByType' => $salesTransanctionByType,
			'salesTransactionTypeList' => $salesTransactionTypeList,
			'vehiclesCountByStatus' => $vehiclesCountByStatus,
			'salesSettled' => $salesSettled,
	]); 

	?>
</div><!-- dashboard -->

