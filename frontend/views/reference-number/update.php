<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReferenceNumber */

$this->title = 'Update Reference Number: ' . ' ' . $model->reference_prefix;
$this->params['breadcrumbs'][] = ['label' => 'Reference Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reference_prefix, 'url' => ['view', 'id' => $model->reference_prefix]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reference-number-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
