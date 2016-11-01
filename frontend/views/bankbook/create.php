<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bankbook */

$this->title = 'Create Bankbook';
$this->params['breadcrumbs'][] = ['label' => 'Bankbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bankbook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
