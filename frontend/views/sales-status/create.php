<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalesStatus */

$this->title = 'Create Sales Status';
$this->params['breadcrumbs'][] = ['label' => 'Sales Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
