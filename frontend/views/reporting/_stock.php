<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\VehicleCostingSearch;
use yii\helpers\ArrayHelper;
use app\models\StockStatus;
use miloschuman\highcharts\Highcharts;
use \fruppel\googlecharts\GoogleCharts;
use scotthuangzl\googlechart\GoogleChart;
use yii\web\JsExpression;

echo '<div class="container"><div class="row-fluid"><div class="col-md-6">';
echo GoogleChart::widget(array('visualization' => 'PieChart',
                'data' => $type,
                'options' => array('title' => 'Vehicles by Type')
));

echo '</div><div class="col-md-6">';

echo GoogleChart::widget(array('visualization' => 'PieChart',
			'data' => $make,
			'options' => array('title' => 'Vehicles by Make','is3D' => true)
));
echo "</div></div></div>";


echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Total vehicle sales by Type',
        ],
        'xAxis' => [
            'categories' => $cat,//car types
        ],
        'labels' => [
            'items' => [
                [
                    'html' => 'Total vehicle sales by type',
                    'style' => [
                        'left' => '50px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => $bar,
    ]
]);
?>
