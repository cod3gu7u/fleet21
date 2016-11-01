<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Reporting */
/* @var $form ActiveForm */

$this->title = 'Parameter Input';
$this->params['breadcrumbs'][] = ['label' => 'Reporting', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="reporting">
	<h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
		<?= DatePicker::widget([
		    'model' => $model,
		    'attribute' => 'start_date',
		    'attribute2' => 'end_date',
		    'options' => ['placeholder' => 'Start date'],
		    'options2' => ['placeholder' => 'End date'],
		    'type' => DatePicker::TYPE_RANGE,
		    'form' => $form,
		    'pluginOptions' => [
		        'todayHighlight' => true,
		        'format' => 'yyyy-mm-dd',
		        'autoclose' => true,
		    ]
		]); ?>
        <?= $form->field($model, 'param') ?>
    	<?= Html::activeHiddenInput($model, 'controller_path', ['value' => $controller_path]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- reporting -->
