<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\VehicleCostingSearch;
use yii\helpers\ArrayHelper;
use app\models\StockStatus;
use \fruppel\googlecharts\GoogleCharts;
use scotthuangzl\googlechart\GoogleChart;
use miloschuman\highcharts\Highstock;
use miloschuman\highcharts\SeriesDataHelper;

 use miloschuman\highcharts\Highcharts;
 use yii\web\JsExpression;
/* @var $this yii\web\View */

$this->title = 'Fleet 21';
?>
<div class="site-index">

    
    <div class="body-content">
		<?php
		echo '<div class="container"><div class="row-fluid"><div class="col-md-3">';
		echo GoogleChart::widget(array('visualization' => 'PieChart',
						'data' => $type,
						'options' => array('title' => 'Vehicles by Type')
		));
		
		echo '</div><div class="col-md-3">';
		echo GoogleChart::widget(array('visualization' => 'PieChart',
						'data' => $vehiclesByStockStatus,
						'options' => array('title' => 'Vehicles by Stock Status')
		));

		echo '</div><div class="col-md-3">';

		echo GoogleChart::widget(array('visualization' => 'PieChart',
					'data' => $make,
					'options' => array('title' => 'Vehicles by Make','is3D' => true)
		));
		echo '</div><div class="col-md-3">';

		echo "</div></div></div>";
		?>
        <div class="row">
            <div class="col-lg-12">
			<?php 
               echo Yii::$app->controller->renderPartial('charts/_sales_by_type',[
                                'salesByType' => $salesByType,
								'monthsArray' => $monthsArray,
                            ]); 
               
                          
             ?>
                
            </div>
<!--
            <div class="col-lg-2">
			</div>
-->
        </div>
				
		<div class="row">
            <div class="col-lg-12">
                <?php 
                echo Yii::$app->controller->renderPartial('charts/_salesPerDay',[
								'salesPerDay' => $salesPerDay, 
                            ]);
				echo Yii::$app->controller->renderPartial('charts/_total_monthly_sales',[
							'salesPerMonth' => $salesPerMonth
						]);
					
                ?>   
                 
            </div>
        </div>

    </div>
</div>
