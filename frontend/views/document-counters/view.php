<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentCounters */

$this->title = $model->prefix;
$this->params['breadcrumbs'][] = ['label' => 'Document Counters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-counters-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->prefix], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->prefix], [
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
            'prefix',
            'counter',
            'notes:ntext',
            'record_status',
        ],
    ]) ?>

</div>
