<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccountMaster */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Account Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-master-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->account_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->account_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'account_id',
            'root',
            'lft',
            'rgt',
            'lvl',
            'name',
            'account_type_id',
            'icon',
            'icon_type',
            'active',
            'selected',
            'disabled',
            'readonly',
            'visible',
            'collapsed',
            'movable_u',
            'movable_d',
            'movable_l',
            'movable_r',
            'removable',
            'removable_all',
        ],
    ]) ?>

</div>
