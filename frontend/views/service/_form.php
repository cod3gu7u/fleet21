<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\builder\TabularForm;
use app\models\ServiceItem;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

<?php if($model->isNewRecord):?>

<div class="sales-form">

<?= Yii::$app->controller->renderPartial('_form-header',[
                        // 'searchModel' => $searchModel,
                        'model' => $model,
                    ]);
?>

</div>

<?php else:?>

<div class="service-static-form">

<?= Yii::$app->controller->renderPartial('_form-header-post',[
                        // 'searchModel' => $searchModel,
                        'model' => $model,
                    ]);
?>

</div>



<?php 
    Pjax::begin(); 
    echo "Serice ID: " . $model->service_id;
    echo Yii::$app->controller->renderPartial('@app/views/service-item/index',[
                'id' => $model->service_id,
                'foobar' => 'foobar',
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getServiceItems(),
                    'pagination' => false
                    ]),
            ]);
    Pjax::end();
?>

<?php endif?>

</div>
