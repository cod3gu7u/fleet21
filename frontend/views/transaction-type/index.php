<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransactionTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaction Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!-- <?php echo $this->render('_search', ['model' => $searchModel]); ?> -->

    <p>
        <?= Html::a('Create Transaction Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->transaction_type), ['view', 'id' => $model->transaction_id]);
        },
    ]) ?>

</div>
