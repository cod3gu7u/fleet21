<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ServiceMovementType */

$this->title = 'Create Service Movement Type';
$this->params['breadcrumbs'][] = ['label' => 'Service Movement Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-movement-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
