<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CostCategory */

$this->title = $model->cost_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Cost Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cost-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cost_category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cost_category_id], [
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
            'cost_category_id',
            'cost_category',
            'notes:ntext',
            'record_status',
        ],
    ]) ?>

</div>
