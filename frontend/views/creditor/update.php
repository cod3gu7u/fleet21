<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Creditor */

$this->title = 'Update Creditor: ' . ' ' . $model->creditor_id;
$this->params['breadcrumbs'][] = ['label' => 'Creditors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->creditor_id, 'url' => ['view', 'id' => $model->creditor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="creditor-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
