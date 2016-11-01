<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CreditorType */

$this->title = 'Update Creditor Type: ' . ' ' . $model->creditor_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Creditor Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->creditor_type_id, 'url' => ['view', 'id' => $model->creditor_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="creditor-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
