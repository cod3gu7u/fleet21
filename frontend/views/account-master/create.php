<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AccountMaster */

$this->title = 'Create Account Master';
$this->params['breadcrumbs'][] = ['label' => 'Account Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
