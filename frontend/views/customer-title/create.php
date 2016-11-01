<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CustomerTitle */

$this->title = 'Create Customer Title';
$this->params['breadcrumbs'][] = ['label' => 'Customer Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
