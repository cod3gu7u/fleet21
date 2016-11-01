<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cashbook */

$this->title = 'Update Book Entry: ' . ' ' . $model->cashbook_entry_id;
$this->params['breadcrumbs'][] = ['label' => 'Cashbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cashbook_entry_id, 'url' => ['view', 'id' => $model->cashbook_entry_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cashbook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
