<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalesPerson */

$this->title = 'Create Sales Person';
$this->params['breadcrumbs'][] = ['label' => 'Sales People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
