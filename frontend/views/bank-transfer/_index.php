<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BankTransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bank Transfers';

$total_amount = 0; 
foreach  ($dataProvider->getModels()  as  $key => $val) { 
        $total_amount += $val['amount']; 
    } 


?>
<div class="bank-transfer-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <h4><?= Html::encode($subtitle) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'footerRowOptions'=>['style'=>'font­weight:bold;text­decoration: underline;', 'class'=>'active'],
        'headerRowOptions'=>['class'=>'info'],
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'bank_transfer_id',
            [ 
                'attribute' => 'source_bank_id',
                'label' => 'Source Bank', 
                'value' => 'sourceBank.bank', 
            ],
            [ 
                'attribute' => 'destination_bank_id',
                'label' => 'Destination Bank', 
                'value' => 'destinationBank.bank', 
            ],
            'transfer_date',
            [
                'attribute' => 'amount',
                'format' => 'currency',
                'footer' => '<strong>' . Yii::$app->formatter->asCurrency($total_amount) . '</strong>',
            ],
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',

            // ['class' => 'yii\grid\ActionColumn'],
        ],

        'tableOptions' =>['class' => 'table table­-striped table­-bordered table-condensed'],
        // 'afterRow' => function($model, $key, $index, $grid){
        //     return
        //     '<tr class="info"> <caption>Details</caption>' .
        //         '<tr><th colspan="4">Notes</th></tr>' . 
        //         '<tr><td colspan="4">' .   
        //             $model->notes . '</td>
        //         </tr></tr>';
        // },

    ]); ?>
<?php Pjax::end(); ?></div>
