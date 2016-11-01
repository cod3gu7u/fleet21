<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\tabs\TabsX;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicle */

$this->title = 'Update Vehicle: ' . ' ' . $model->reference_number;
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_id, 'url' => ['view', 'id' => $model->vehicle_id]];
$this->params['breadcrumbs'][] = 'Update';

$total = 0;
?>

<?php Pjax::begin(['id'=>'vehicle-update-tabsx'])?>
<div class="vehicle-update">

    <h3><?= Html::encode($this->title) ?></h3>

<?php    
    // Render related vehicle costing
    $vehicle_costing = "<h3>Costing</h3>";
    $vehicle_costing = $vehicle_costing . \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getVehicleCostings(),
            'pagination' => false,
            ]),
         'showFooter'=>true,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

	            // 'vehicle_costing_id',
	            'creditor.creditor',
	            // 'vehicle_id',
	            'costCategory.cost_category',
	            'cost_date',
	            'transaction_amount',
	            'currency.currency_short',
				'exchange_rate',
				[
					'attribute'=>'total_amount',
					'value'=>function ($model, $key, $index, $widget) use ($total) {
				        $total += $model->total_amount;
				        return $model->total_amount;
				     },
				     // 'footer' => function () use (&$total) {
				     //    //format the total here
				     //    return $total;
				     // }, 
				     // 'footer' => function () use ($total){ return 999; },
				     // ) {
				        //format the total here
				        // return $total;
				     // },
					// 'footer'=>'xxxx',
					// 'footer'=>\app\models\VehicleCosting::totalCost($provider, 'total_amount'),
				],
	            // 'notes:ntext',
	            // 'record_status',
	            // 'create_user_id',
	            // 'create_date',
	            // 'update_user_id',
	            // 'update_date',

            [
            'class' => yii\grid\ActionColumn::className(),
			'controller' => 'vehicle-costing',
			'header' => '<i class="glyphicon glyphicon-plus"></i>&nbsp;Create New', 
			'template' => '{view} {update} {delete}',
			'headerOptions' => ['width' => '100%', 'class' => 'showModalButton btn btn-success',
					'value'=>Url::to(['vehicle-costing/create', 'id' => $model->vehicle_id]),],
			'buttons' => [
						'update' => function ($url, $model, $key) {
							return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
								Yii::$app->urlManager->createUrl(['/vehicle-costing/update', 'id' => $model->vehicle_id ]),
								[
								'class' => 'showModalButton',
								'title' => Yii::t('app', 'Update'),
								'data-toggle' => 'modal',
								'data-target' => '#modalContent',
								'data-id' => $key,
								'data-pjax' => '0',
							]);
						},
						'view' => function ($url, $model, $key) {
							return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', 
								Yii::$app->urlManager->createUrl(['/vehicle-costing/view', 'id' => $model->vehicle_id ]),
								[
								'class' => 'showModalButton',
								'title' => Yii::t('app', 'View'),
								'data-toggle' => 'modal',
								'data-target' => '#modalContent',
								'data-id' => $key,
								'data-pjax' => '0',
							]);
						},
						// 'delete' => function ($url, $model, $key) {
						// 	return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', 
						// 		Yii::$app->urlManager->createUrl(['/vehicle-costing/delete', 'id' => $model->vehicle_id ]),
						// 		[
						// 		'class' => 'showModalButton',
						// 		'title' => Yii::t('app', 'View Student Contact'),
						// 		'data-toggle' => 'modal',
						// 		'data-target' => '#modalContent',
						// 		'data-id' => $key,
						// 		'data-pjax' => '0',
						// 	]);
						// }
					],
            ],
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
            // 'notes:ntext',
            'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            [
            'class' => yii\grid\ActionColumn::className(),
			'controller' => 'vehicle-photo',
			'header' => '<i class="glyphicon glyphicon-plus"></i>&nbsp;Create New', 
			'template' => '{view} {delete}',
			'headerOptions' => ['width' => '100%', 'class' => 'showModalButton btn btn-success',
					'value'=>Url::to(['vehicle-photo/create', 'id' => $model->vehicle_id]),],
			'buttons' => [
						'view' => function ($url, $model, $key) {
							return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', 
								Yii::$app->urlManager->createUrl(['/vehicle-photo/view', 'id' => $key ]),
								[
								'class' => 'showModalButton',
								'title' => Yii::t('app', 'View'),
								'data-toggle' => 'modal',
								'data-target' => '#modalContent',
								'data-id' => $key,
								'data-pjax' => '0',
							]);
						},
						'delete' => function ($url, $model, $key) {
							return Html::a('<span class="glyphicon glyphicon-trash"></span>', 
								Yii::$app->urlManager->createUrl(['/vehicle-photo/delete', 'id' => $key ]),
								[
								'class' => 'showModalButton',
								'title' => Yii::t('app', 'Delete'),
								'data-toggle' => 'modal',
								'data-target' => '#modalContent',
								'data-id' => $key,
								'data-pjax' => '0',
							]);
						}
					],
            ],
        ],
    ]);

    $items = [
         [
            'label'=>'<i class="fa fa-cab"></i> Vehicle',
            'content'=>$this->render('_form', ['model' => $model]),
            'encode'=>false,
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

</div>

<?php Pjax::end() ?>

<?php

$this->registerJs("
	$(document).ready(function(){
		$('#vehicle-reference_number').prop('disabled', true);
	});
"); 
?>
