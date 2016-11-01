<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use kartik\tabs\TabsX;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicle */

$this->title = $model->reference_number;
// $this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-view">

    <h3><?= Html::encode($this->title) ?></h3>
    <div id="showBarcode"></div> <!--This element id should be passed on to options-->
    <?php
        use barcode\barcode\BarcodeGenerator as BarcodeGenerator;
         
        $optionsArray = array(
        'elementId'=> 'showBarcode', /* div or canvas id*/
        'value'=> $model->reference_number, /* value for EAN 13 be careful to set right values for each barcode type */
        'type'=>'code128',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/
         
        );
        echo BarcodeGenerator::widget($optionsArray);
    ?>

    <?= Html::a('<i class="glyphicon glyphicon-print"></i>', ['sticker-report', 'id' => $model->vehicle_id],
            [   'class' => 'btn btn-info',
                'id' => 'report_btn',
                'target'=> '_blank',
                'title'=> Yii::t('app', 'Print Report'),]) ?>

<?php Pjax::begin(); ?>
    <?php 
    $vehicle = DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'vehicle_id',
            'reference_number',
            'location.location',
            'make.make',
            'vehicleType.vehicle_type',
            'model_id',
            'model_year',
            'chassis',
            'engine',
            'color.color',
            'capacity',
            'arrival_date',
            'arrival_mileage',
            'stockStatus.stock_status',
            'asking_price',
            'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) ?>

<?php

    // Render related vehicle costing
    $vehicle_costing = "<h3>Costing</h3>";
    $vehicle_costing = $vehicle_costing . \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getVehicleCostings(),
            'pagination' => false
            ]),
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'vehicle_costing_id',
            'creditor.creditor',
            // 'vehicle_id',
            'costCategory.cost_category',
            'cost_date',
            'total_amount',
            'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    // Render related vehicle photo
    $vehicle_photo = "<h3>Photo</h3>";
    $vehicle_photo = $vehicle_photo . \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getVehiclePhotos(),
            'pagination' => false
            ]),
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'vehicle_photo_id',
            // 'vehicle_id',
            // 'photograph',
             [
                'label'=>'Image',
                'format'=>'raw',
                'value' =>  function ($data){
                    $url = " http://fleet21.dev//frontend/web/uploads/vehicles/" . $data->photograph;
                    return  Html::img($url,['alt'=>'<i class="fa fa-cab"></i>vehicle-photo', 'width'=>'150']);
                }
            ],
            'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
?>

<?php
    $items = [
        [
            'label'=>'<i class="fa fa-cab"></i> Vehicle',
            'content'=>$vehicle,
            'active'=>true,
        ],
        [
            'label'=>'<i class="fa fa-money"></i> Costing',
            'content'=>$vehicle_costing,
            'encode'=>false,
        ],
        [
            'label'=>'<i class="fa fa-camera"></i> Photo',
            'content'=>$vehicle_photo,
            'encode'=>false,
        ],
    ];
    
    echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false,
    'bordered'=>true,
    ]);
?>
        
<?php Pjax::end(); ?>

</div>
