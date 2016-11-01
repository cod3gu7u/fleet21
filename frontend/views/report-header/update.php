<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportHeader */

$this->title = 'Update Report: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Report Headers', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-header-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<div class="report-definition-form">
<?= Yii::$app->controller->renderPartial('@app/views/report-definition/index',[
                'report_header_id' => $model->id,
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getReportDefinitions(),
                    'pagination' => false
                    ]),
            ]);
            ?>
</div>
