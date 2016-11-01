<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StockIssuanceDetail */

$this->title = 'Create Stock Issuance Detail';
$this->params['breadcrumbs'][] = ['label' => 'Stock Issuance Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-issuance-detail-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
