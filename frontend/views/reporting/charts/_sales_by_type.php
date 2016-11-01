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
				'text' => 'Total Monthly vehicle sales by Type',
			],
			'xAxis' => [
				'categories' => $monthsArray,//car types
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
			'series' => $salesByType,
		]
	]);
	//~ var_dump($salesByType);
	//~ echo "<br> ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
	//~ var_dump($monthsArray);

?>
