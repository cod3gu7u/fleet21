
<?php
use \fruppel\googlecharts\GoogleCharts;
use scotthuangzl\googlechart\GoogleChart;
//use miloschuman\highcharts\Highcharts;
//use yii\web\JsExpression;
use miloschuman\highcharts\Highstock;
use yii\helpers\Html;

/**
 * THE VIEW BUTTON
 */
 
echo $this->render('_dashboard', [
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
		'salesSettled' => $salesSettled
]); 

?>

