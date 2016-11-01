<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StockIssuance */

$this->title = 'Update Stock Issuance: ' . ' ' . $model->stock_issuance_id;
$this->params['breadcrumbs'][] = ['label' => 'Stock Issuances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stock_issuance_id, 'url' => ['view', 'id' => $model->stock_issuance_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-issuance-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php if (!Yii::$app->user->can('admin')) : ?>
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	<?php else: ?>
		<?= $this->render('_view', ['model' => $model,]) ?>
	<?php endif; ?>

	<div class="purchase-order-line-item-form">
	<?= Yii::$app->controller->renderPartial('@app/views/stock-issuance-detail/index',[
	                'stock_issuance_id' => $model->stock_issuance_id,
	                'dataProvider' => new \yii\data\ActiveDataProvider([
	                    'query' => $model->getStockIssuanceDetails(),
	                    'pagination' => false
	                    ]),
	            ]);
	            ?>
	</div>

</div>
