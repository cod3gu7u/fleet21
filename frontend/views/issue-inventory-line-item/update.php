<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IssueInventoryLineItem */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Issue Inventory Line Item',
]) . $model->issue_inventory_line_item_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Issue Inventory Line Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->issue_inventory_line_item_id, 'url' => ['view', 'id' => $model->issue_inventory_line_item_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="issue-inventory-line-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
