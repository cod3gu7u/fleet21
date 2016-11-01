<?php
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;
?>

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
           $callback = function($menu){
                return [
                    'label' => $menu['name'],
                    'url' => [$menu['route']],
                    'icon' => $menu['data'],
                    'active' => $menu['route'],
                    'items' => $menu['children']
                ];
            };

            $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback, true);

        ?>

        <?=
            dmstr\widgets\Menu::widget([
               'options' => ['class' => 'sidebar-menu'],
               'items' => $items
            ]);
        ?>

    </section>

</aside>
