<?php

use kartik\tree\TreeView;
use app\models\AccountMaster;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Masters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-master-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Account Master', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        echo TreeView::widget([
            // single query fetch to render the tree
            // use the Product model you have in the previous step
            'query' => AccountMaster::find()->addOrderBy('root, lft'), 
            'headingOptions' => ['label' => 'Account-Master'],
            'fontAwesome' => false,     // optional
            'isAdmin' => true,         // optional (toggle to enable admin mode)
            'displayValue' => 1,        // initial display value
            'softDelete' => true,       // defaults to true
            'softDelete' => true,       // defaults to true
            'cacheSettings' => [        
                'enableCache' => true   // defaults to true
            ]
        ]);

        // echo TreeViewInput::widget([
        //     // single query fetch to render the tree
        //     // use the Product model you have in the previous step
        //     'query' => AccountMaster::find()->addOrderBy('root, lft'), 
        //     'headingOptions'=>['label'=>'Account Master'],
        //     'name' => 'kv-product', // input name
        //     'value' => '1,2,3',     // values selected (comma separated for multiple select)
        //     'asDropdown' => true,   // will render the tree input widget as a dropdown.
        //     'multiple' => true,     // set to false if you do not need multiple selection
        //     'fontAwesome' => true,  // render font awesome icons
        //     'rootOptions' => [
        //         'label'=>'<i class="fa fa-tree"></i>',  // custom root label
        //         'class'=>'text-success'
        //     ], 
        //     //'options'=>['disabled' => true],
        // ]);
    ?>

</div>



 
