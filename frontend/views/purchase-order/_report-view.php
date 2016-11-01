<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */

$this->title = 'Purchase Order : ' . $model->purchase_order_id;
// $this->params['breadcrumbs'][] = ['label' => 'Purchase Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?=
        Yii::$app->controller->renderPartial('_view-header',['model' => $model,]);
    ?>
</div>

<div class="purchase-order-line-item-form">
<?= Yii::$app->controller->renderPartial('@app/views/purchase-order-line-item/index-view',[
                'purchase_order_id' => $model->purchase_order_id,
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getPurchaseOrderLineItems(),
                    'pagination' => false
                    ]),
            ]);
            ?>
</div>