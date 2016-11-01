<?php
use \fruppel\googlecharts\GoogleCharts;
?>

<?= GoogleCharts::widget([
    'id' => 'my-id',
    'visualization' => 'PieChart',
    'data' => [
        'cols' => [
            [
                'id' => 'topping',
                'label' => 'Topping',
                'type' => 'string'
            ],
            [
                'id' => 'vehicles',
                'label' => 'Vehicles',
                'type' => 'number'
            ]
        ],
        'rows' => [
            [
                'c' => [
                    ['v' => 'Toyota'],
                    ['v' => 3]
                ],
            ],
            [
                'c' => [
                    ['v' => 'Honda'],
                    ['v' => 1]
                ]
            ],
            [
                'c' => [
                    ['v' => 'Mercedes-Benz'],
                    ['v' => 1]
                ]
            ],
            [
                'c' => [
                    ['v' => 'BMW'],
                    ['v' => 1]
                ]
            ],
            [
                'c' => [
                    ['v' => 'Volkswagen'],
                    ['v' => 2]
                ]
            ],
        ]
    ],
    'options' => [
        'title' => 'Vehicles by Status',
        'width' => 200,
        'height' => 200,
        'is3D' => true,
    ],
    'responsive' => true,
]) ?>