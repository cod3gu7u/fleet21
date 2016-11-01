<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DocumentCounters */

$this->title = 'Create Document Counters';
$this->params['breadcrumbs'][] = ['label' => 'Document Counters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-counters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
