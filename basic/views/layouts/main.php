<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?>project</title>
    <?php $this->head() ?>
    <?= Html::cssFile('@web/css/bootstrap.css') ?>
    <?= Html::cssFile('@web/css/font-awesome.css') ?>
    <?= Html::cssFile('@web/css/main.css') ?>
</head>
<body>
<?php $this->beginBody() ?>
<main class="main container">
    <header class="top span12">
    	<a href="/">
    		<img src="/img/logotip.png" alt="logotip">
    	</a>
    	<div class="header-menu">
    	</div>
    	<div class="claer"></div>
    </header>
    <content class="content span12">
    	<?= $content ?>
    </content>
    <footer class="footer span12">&#169 2015 Wise Engineering</footer>
</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
