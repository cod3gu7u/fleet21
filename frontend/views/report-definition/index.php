<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportDefinitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $report_header_id  */

$this->title = 'Report Definitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-definition-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(
                '<i class="glyphicon glyphicon-plus"></i> Create Report Definition', 
                ['report-definition/create', 'report_header_id' => $report_header_id], 
                ['class'=>'showModalButton btn btn-success', ]
            )
        ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'report_header_id',
            'accountType.account_type',
            'parent_id',
            'side',
            'order_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
