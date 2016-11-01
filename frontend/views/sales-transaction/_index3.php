<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="row">
	  <?= ListView::widget([
	    'options' => [
	      'tag' => 'div',
	    ],
	    'dataProvider' => $dataProvider,
	    'itemView' => function ($model, $key, $index, $widget) {
	      $itemContent = $this->render('_view_detail',['model' => $model]);

	      return $itemContent;
	    },
	    'itemOptions' => [
	      'tag' => false,
	    ],
	    'summary' => '',

	    /* do not display {summary} */
	    'layout' => '{items}{pager}',

	    'pager' => [
	      'firstPageLabel' => '<span class="glyphicon glyphicon-fast-backward"></span>',
	      'lastPageLabel' => '<span class="glyphicon glyphicon-fast-forward"></span>',
	      'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
	      'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
	      'maxButtonCount' => 4,
	      'options' => [
	        'class' => 'pagination col-xs-12'
	      ]
	    ],

	  ]);
	  ?>
	</div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->sales_transaction_id), ['view', 'id' => $model->sales_transaction_id]);
        },
    ]) ?>
</div>