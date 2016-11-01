<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->request->baseUrl . '/frontend/web' ?>/img/user1-128x128.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
		<?php
		$menuItems = [
			['label' => 'Home', 'url' => ['/site/index']],
			['label' => 'About', 'url' => ['/site/about']],
			['label' => 'Contact', 'url' => ['/site/contact']],
		];
		?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
					['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 'url' => ['/site/index']],
					//['label' => 'Contact', 'url' => ['/site/contact']],

					['label' => 'Operations', 'icon' => 'fa fa-tasks', 'url' => '#',
						'items' => [
									['label' => 'Customer', 'icon' => 'fa fa-user', 'url' => ['/customer/index']],
									['label' => 'Vehicle', 'icon' => 'fa fa-car', 'url' => ['/vehicle/index']],
									['label' => 'Sales', 'icon' => 'fa fa-cart-plus', 'url' => ['/sales/index']],
									['label' => 'Delivery', 'icon' => 'fa fa-road', 'url' => ['/delivery/index']],
									['label' => 'Service', 'icon' => 'fa fa-cab', 'url' => ['/service/index']],
									['label' => 'Service Movement', 'icon' => 'fa fa-cubes', 'url' => ['/service-vehicle-movement/index']],
									['label' => 'Creditor', 'icon' => 'fa fa-credit-card', 'url' => ['/creditor/index']],
									['label' => 'Cashbook', 'icon' => 'fa fa-money', 'url' => ['/cashbook/index']]
						],

					],

					['label' => 'Accounting', 'icon' => 'fa fa-book', 'url' => '#',
						'items' => [
									['label' => 'Chart of Accounts', 'icon' => 'fa fa-folder-open', 'url' => ['/account/index']],
									['label' => 'Batch', 'icon' => 'fa fa-archive', 'url' => ['/batch/index']],
									['label' => 'Journal', 'icon' => 'fa fa-calendar', 'url' => ['/journal/index']],
									['label' => 'Posting', 'icon' => 'fa fa-upload', 'url' => ['/posting/index']],
						],

					],

					['label' => 'Cashbook', 'icon' => 'fa fa-money', 'url' => '#',
						'items' => [
							['label' => 'Bank', 'icon' => 'fa fa-building', 'url' => ['/bank/index']],
							['label' => 'Cashbook', 'icon' => 'fa fa-money', 'url' => ['/cashbook/index']],
						]
					],

					['label' => 'Settings', 'icon' => 'fa fa-cogs', 'url' => '#',
						'items' => [
							['label' => 'Accounts', 'url' => '#', 'items' => [
                                ['label' => 'Account Types', 'url' => ['/account-type/index']],
                                ['label' => 'Journal Types', 'url' => ['/journal-type/index']],
                                ['label' => 'Asset Types', 'url' => ['/asset-type/index']],
                                ['label' => 'Accounting Period', 'url' => ['/accounting-period/index']],
                                ['label' => 'Tax', 'url' => ['/tax/index']],
                                ['label' => 'Transaction Types', 'url' => ['/transaction-type/index']],
                                ['label' => 'Currency', 'url' => ['/currency/index']],
                                ['label' => 'Payment Method', 'url' => ['/payment-method/index']],
                            ]],
                            ['label' => 'Sales', 'url' => '#', 'items' => [
                                ['label' => 'Sales Person', 'url' => ['/sales-person/index']],
                                ['label' => 'Sales Status', 'url' => ['/sales-status/index']],
                                ['label' => 'Delivery Status', 'url' => ['/delivery-status/index']],
                                ['label' => 'Sales Transaction Type', 'url' => ['/sales-transaction-type/index']],
                            ]],
                            ['label' => 'Vehicle', 'url' => '#', 'items' => [
                                ['label' => 'Colors', 'url' => ['/color/index']],
                                ['label' => 'Locations', 'url' => ['/location/index']],
                                ['label' => 'Reference', 'url' => ['/reference-number/index']],
                                ['label' => 'Stock Status', 'url' => ['/stock-status/index']],
                                ['label' => 'Vehicle Models', 'url' => ['/vehicle-model/index']],
                                ['label' => 'Vehicle Make', 'url' => ['/vehicle-make/index']],
                                ['label' => 'Vehicle Types', 'url' => ['/vehicle-type/index']],
                                ['label' => 'Cost Category', 'url' => ['/cost-category/index']],
                            ]],
                            ['label' => 'Customer', 'url' => '#', 'items' => [
                                ['label' => 'Customer Type', 'url' => ['/customer-type/index']],
                                ['label' => 'Customer Title', 'url' => ['/customer-title/index']],
                            ]],
                            ['label' => 'Creditor', 'url' => '#', 'items' => [
                                ['label' => 'Creditor Type', 'url' => ['/creditor-type/index']],
                            ]],
                            ['label' => 'Service Movement', 'url' => '#', 'items' => [
                                ['label' => 'Service Movement Type', 'url' => ['/service-movement-type/index']],
                                // ['label' => 'Customer Title', 'url' => ['/customer-title/index']],
                            ]],
						]
					],

					['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => [yii\helpers\Url::to(['site/logout'])],
                        'template' => '<a href="{url}" data-method="post">{label}</a>',
					],
					['label' => 'About', 'icon' => 'fa fa-comments', 'url' => ['/site/about']]

                ],
            ]
        ) ?>

    </section>

</aside>
