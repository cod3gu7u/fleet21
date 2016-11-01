<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JournalType */

$this->title = 'Update Journal Type: ' . ' ' . $model->journal_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->journal_type_id, 'url' => ['view', 'id' => $model->journal_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
