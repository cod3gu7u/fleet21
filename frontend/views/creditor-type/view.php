<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CreditorType */

$this->title = $model->creditor_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Creditor Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditor-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->creditor_type_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->creditor_type_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'creditor_type_id',
            'creditor_type',
            'notes:ntext',
            'record_status',
        ],
    ]) ?>

</div>
