<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JournalType */

$this->title = 'Create Journal Type';
$this->params['breadcrumbs'][] = ['label' => 'Journal Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
