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
use frontend\controllers;
/* @var $this yii\web\View */

$this->title = 'Fleet 21'; 
?>

<div class="site-index">
	 <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $vehiclesCountByStatus['today_Sold'];?></h3>

              <p>Vehicle sold today</p>
              <p><?php echo "<b>".$vehiclesCountByStatus['Sold']. "</b> Total Vehicles sold"; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $salesSettled['sales_settled_today']; ?></h3>

              <p>Sales settled today</p>
               <p><?php echo "<b>".$salesSettled['all_settled_sales']. "</b> total settled Vehicles"; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 class="inline"><?php echo $vehiclesCountByStatus['today_Reserved']; ?></h3>
              <p>Vehicle reserved today</p>
              <p><?php echo "<b>".$vehiclesCountByStatus['Reserved']. "</b>  total vehicles reserved"; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $vehiclesCountByStatus['In Stock']; ?></h3>

              <p>Total vehicles in stock</p>
              <p>-</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    <!-- Main row -->
    <div class="row">
		<!-- Left col -->
		<div class="col-md-8">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Daily Transactions Summary</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php
						echo 'Total Transations Today: '.$salesTransanctionByType['today_transactions'].' / ' .$salesTransanctionByType['total_transactions'];
					?>
				  <table class="table table-bordered">
					<tr>
						<th>Transaction</th>
						<th>Overal Transations</th>
						<th>Today's Transactions</th>
						<th>Total Amount</th>
					</tr>
						
					<?php
					$x = 0;
					foreach($salesTransactionTypeList as $value){
						$x++;
						$color = 'red';
						if ($salesTransanctionByType['total_'.$value] <= $salesTransanctionByType['avg_'.$value]) {
							$color = 'green';
						}
						echo '<tr>';
						echo '<td>'. $value .'</td>';
						echo '<td>'. $salesTransanctionByType[$value] .'</td>';
						echo '<td><span class="badge bg-'.$color.'">'. $salesTransanctionByType['today_'.$value] .'</span></td>';
						echo '<td> P'. $salesTransanctionByType['today_total_'.$value] .'</td>';
						echo '</tr>';
						
					}
				?>
				  </table>
		</div>
		<div class="col-md-4">
			
		</div>
	</div>
	
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
