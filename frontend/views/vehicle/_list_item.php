<?php
use yii\helpers\Html;
use kartik\detail\DetailView;
 

$attributes = [
    [
        'group'=>true,
        'label'=>'Vehicle Information: ' . $model->reference_number,
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns' => [
            [
        		// 'group'=>true,
        		'label'=>'Picture: ',
                'format'=>'raw', 
                'value'=> Html::img($model->getTopPhoto($model),
                		[	
                		'class'	=> "img-responsive img-thumbnail img-rounded ",
                		'width'	=> "160px",
                		// 'alt'	=> 'img-thumbnail',
                		]
                	),
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'reference_number', 
                'label'=>'Reference #',
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'location', 
                'format'=>'raw', 
                'value'=>$model->location->location,
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'vehicle_type', 
                'value'=>$model->vehicleType->vehicle_type,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'make', 
                'format'=>'raw', 
                'value'=>$model->make->make,
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ],   
    [
        'columns' => [
            [
                'attribute'=>'model_id', 
                'value'=>$model->model->model,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'model_year', 
                'format'=>'raw', 
                'value'=>$model->model_year,
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ], 
    [
        'columns' => [
            [
                'attribute'=>'color', 
                'value'=>$model->color->color,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'capacity', 
                'format'=>'raw', 
                'value'=>$model->capacity,
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ], 
    [
        'columns' => [
            [
                'attribute'=>'chassis', 
                'value'=>$model->chassis,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'engine', 
                'format'=>'raw', 
                'value'=>$model->engine,
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ], 
    [
        'columns' => [
            [
                'attribute'=>'arrival_date', 
                'value'=>$model->arrival_date,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'arrival_mileage', 
                'format'=>'raw', 
                'value'=>$model->arrival_mileage,
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ], 
    [
        'columns' => [
            [
                'attribute'=>'stock_status', 
                'value'=>$model->stockStatus->stock_status,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            [
                'attribute'=>'asking_price', 
                'format'=>'raw', 
                'value'=>$model->asking_price,
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ], 
    [
        'attribute'=>'notes',
        'format'=>'raw',
        'value'=>'<span class="text-justify"><em>' . $model->notes . '</em></span>',
        'type'=>DetailView::INPUT_TEXTAREA, 
        'options'=>['rows'=>4]
    ]
    ];

echo DetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'mode' => 'view',
    'bordered' => $bordered,
    'striped' => $striped,
    'condensed' => $condensed,
    'responsive' => $responsive,
    'hover' => $hover,
    'hAlign'=>$hAlign,
    'vAlign'=>$vAlign,
    'fadeDelay'=>$fadeDelay,
    // 'deleteOptions'=>[ // your ajax delete parameters
    //     'params' => ['id' => 1000, 'kvdelete'=>true],
    // ],
    'container' => ['id'=>'kv-demo'],
    // 'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
]);

 ?>
