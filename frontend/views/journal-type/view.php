<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JournalType */

$this->title = $model->journal_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->journal_type_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->journal_type_id], [
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
            'journal_type_id',
            'journal_type',
        ],
    ]) ?>

</div>
