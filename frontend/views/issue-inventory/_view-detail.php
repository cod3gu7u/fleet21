<?php
use yii\widgets\DetailView;

echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'issue_inventory_id',
            'vehicle.reference_number',
            'issue_date:date',
            // 'notes:ntext',
            // 'record_status',
            // 'create_user_id',
            // 'create_date',
            // 'update_user_id',
            // 'update_date',
        ],
    ]) 
?>