<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Update Bank: ' . ' ' . $model->bank_id;
// $this->params['breadcrumbs'][] = ['label' => 'Banks', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->bank_id, 'url' => ['view', 'id' => $model->bank_id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="bank-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
