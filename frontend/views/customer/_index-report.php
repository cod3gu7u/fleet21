<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

$counter = 0;
?>

<h3>Customers</h3>

<div class="table-responsive">
  <table class="table table-striped table-condensed">
    <thead>
        <tr>
            <th>#</th><th>Customer Name</th><th>Telephone</th><th>Cellphone</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= ++$counter ?></td>
            <td><?= $customer->customer_name ?></td>
            <td><?= $customer->telephone ?></td>
            <td><?= $customer->cellphone ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>