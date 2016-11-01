<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Posting */

$this->title = 'Update Posting: ' . ' ' . $model->posting_sequence_id;
$this->params['breadcrumbs'][] = ['label' => 'Postings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->posting_sequence_id, 'url' => ['view', 'id' => $model->posting_sequence_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
