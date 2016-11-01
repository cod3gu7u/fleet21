<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bankbook */

$this->title = 'Update Bankbook: ' . ' ' . $model->bankbook_entry_id;
$this->params['breadcrumbs'][] = ['label' => 'Bankbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bankbook_entry_id, 'url' => ['view', 'id' => $model->bankbook_entry_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bankbook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
