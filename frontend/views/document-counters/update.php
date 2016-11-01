<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentCounters */

$this->title = 'Update Document Counters: ' . ' ' . $model->prefix;
$this->params['breadcrumbs'][] = ['label' => 'Document Counters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prefix, 'url' => ['view', 'id' => $model->prefix]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="document-counters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
