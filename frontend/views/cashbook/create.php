<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cashbook */

$this->title = 'Create Book Entry';
$this->params['breadcrumbs'][] = ['label' => 'Cashbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cashbook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
