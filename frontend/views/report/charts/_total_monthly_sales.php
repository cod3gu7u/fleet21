 <?php
 use miloschuman\highcharts\Highcharts;
 use yii\web\JsExpression;
		
	echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => 'Total Sales Per Month',
			],
			'xAxis' => [
				'categories' => $salesPerMonth['months'],//car types
			],
			'labels' => [
				'items' => [
					[
						'html' => 'Total Sales per Month',
						'style' => [
							'left' => '50px',
							'top' => '18px',
							'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
						],
					],
				],
			],
			'series' => array( array('name' => 'Total Sales', 'data' => $total = array_map('intVal', $salesPerMonth['total'])),), //$total,
		]
	]);

?>
