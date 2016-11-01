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
							'text' => 'Total Sales Per Day',
						],
						'xAxis' => [
							'categories' => $salesPerDay['salesdays'],//car types
						],
						'labels' => [
							'items' => [
								[
									'html' => 'Total for the last 30 days',
									'style' => [
										'left' => '50px',
										'top' => '18px',
										'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
									],
								],
							],
						],
						'series' => array( array('name' => 'Total Sales', 'data' => $total = array_map('intVal', $salesPerDay['total'])),), //$total,
					]
				]);

?>
