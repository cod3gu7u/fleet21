<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\AdminLteAsset;
use frontend\widgets\Alert;
use yii\bootstrap\Modal;


/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    // if (class_exists('backend\assets\AppAsset')) {
    //     backend\assets\AppAsset::register($this);
    // } else {
    //     app\assets\AppAsset::register($this);
    // }
	
    //AdminLteAsset::register($this);
    AppAsset::register($this);
    

    $directoryAsset = 'frontend/assets/dist';//Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    $imageAsset = Yii::$app->request->baseUrl . '/frontend/web/img';
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <? if (!Yii::$app->user->isGuest) { ?>
                    <meta http-equiv="refresh" content="<?php echo Yii::$app->params['sessionTimeoutSeconds'];?>;"/>
        <? } ?>
    </head>
    <body class="<?= \dmstr\helpers\AdminLteHelper::skinClass() ?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?php if (!\Yii::$app->user->isGuest): ?>
            
        <?= $this->render(
            'header.php',
            [
            'directoryAsset' => $directoryAsset, 
            'imageAsset' => $imageAsset,
            'visible'=>!\Yii::$app->user->isGuest
            ]
        ) ?>

        <?= $this->render(
            'left.php',
            [
            'directoryAsset' => $directoryAsset,
            'visible'=>!\Yii::$app->user->isGuest
            ]
        )
        ?>

        <?php endif; ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

	<?php
		 yii\bootstrap\Modal::begin([
			'headerOptions' => ['id' => 'modalHeader'],
			'header' => '<h2>title</h2>',
			'id' => 'modal',
			'size' => 'modal-lg',
			//keeps from closing modal with esc key or by clicking out of the modal.
			// user must click cancel or X to close
			'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
		]);
		echo "<div id='modalContent'></div>";
		yii\bootstrap\Modal::end();

	?>
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
