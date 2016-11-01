<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Creditor */

$this->title = $model->creditor_id;
$this->params['breadcrumbs'][] = ['label' => 'Creditors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditor-view">

    <?php if(\Yii::$app->user->can('admin')) : ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->creditor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->creditor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <? endif ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'creditor_id',
            'creditor',
            'creditorType.creditor_type',
            'address',
            'telephone',
            'email:email',
            'notes:ntext',
            'record_status',
        ],
    ]) ?>

</div>
