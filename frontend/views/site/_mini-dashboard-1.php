<?php
use \fruppel\googlecharts\GoogleCharts;
?>

<?= GoogleCharts::widget([
    'visualization' => 'AreaChart',
        'options' => [
            'title' => 'Sales Performance',
            'hAxis' => [
                'title' => 'Year',
                'titleTextStyle' => [
                    'color' => '#333'
                ]
            ],
            'vAxis' => [
                'minValue' => 0
            ]
        ],
    'dataArray' => [
            ['Year', 'Sales', 'Expenses'],
            ['2013',  1000,      400],
            ['2014',  1170,      460],
            ['2015',  660,       1120],
            ['2016',  1030,      540]
    ]
])
?>