<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountType */

$this->title = 'Update Account Type: ' . ' ' . $model->account_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Account Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->account_type_id, 'url' => ['view', 'id' => $model->account_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
