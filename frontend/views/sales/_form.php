<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\builder\TabularForm;
use app\models\SalesTransaction;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if($model->isNewRecord):?>

<div class="sales-form">

<?= Yii::$app->controller->renderPartial('_form-header',[
                        // 'searchModel' => $searchModel,
                        'model' => $model,
                    ]);
?>

</div>

<?php else:?>

<div class="sales-form-static">
<?= Yii::$app->controller->renderPartial('_form-header-static',[
                        // 'searchModel' => $searchModel,
                        'model' => $model,
                    ]);
?>
</div>


<div class="sales-transaction-form">
<?= Yii::$app->controller->renderPartial('@app/views/sales-transaction/index',[
                // 'searchModel' => new \app\models\SalesTransactionSearch(),
                'sales_id' => $model->sales_id,
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getSalesTransactions(),
                    'pagination' => false
                    ]),
            ]);
            ?>
</div>
<?php endif?>



