<?php
use yii\helpers\Html;
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
              <h3>150</h3>

              <p>New Sales</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <?= Html::a('Make a sale <i class="fa fa-cart-plus"></i>', ['/sales/index'], ['class' => 'small-box-footer'] ) ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><i class="fa fa-car"></i></h3>

              <p>205 Vehicles in stock</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <?= Html::a('Receive Stock <i class="fa fa-car"></i>', ['/vehicle/create'], ['class' => 'small-box-footer'] ) ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><i class="fa fa-group"></i></h3>

              <p>New Customers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <?= Html::a('Create Customer <i class="fa fa-group"></i>', ['/customer/create'], ['class' => 'small-box-footer'] ) ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Monthly Delivery</p>
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
    
    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <?= Yii::$app->controller->renderPartial('_mini-dashboard',[
                                // 'model' => ''$model'',
                            ]);
                ?>
            </div>
            <div class="col-lg-6">
                <?= Yii::$app->controller->renderPartial('_mini-dashboard-1',[
                                // 'model' => $model,
                            ]);
                ?>    
            </div>
        </div>

    </div>
</div>
