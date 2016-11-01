<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AssetType */

$this->title = 'Update Asset Type: ' . ' ' . $model->asset_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Asset Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->asset_type_id, 'url' => ['view', 'id' => $model->asset_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
