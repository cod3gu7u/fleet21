<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReferenceNumber */

$this->title = 'Create Reference Number';
$this->params['breadcrumbs'][] = ['label' => 'Reference Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reference-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
