<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use app\components\UserWidget;
use yii\base\Widget;


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
		<?php AppAsset::register($this);?>
</head>
<body>

<?php $this->beginBody() ?>

<div data-class="<?= Yii::$app->controller->id ?>" 
	data-method="<?= Yii::$app->controller->module->requestedAction->id ?>" 
	class="container"></div>
<main class="main container">
    <header class="top span12">
    	<a href="<?= Url::home(); ?>">
    		<img src="/img/logotip.png" alt="logotip">
    	</a>
    	<div class="header-menu">
    		<ul>
    			<?php foreach($this->params['menu'] as $menubutton)
    			{
    				echo $this->render('@app/views/elements/' . $menubutton);
    			}
    			?>   			
    		</ul>
    	</div>
    	<div class="claer"></div>
    </header>
    <content class="content span12">
    	<?= $content ?>
    </content>
    <footer class="footer span12">&#169 2005 - <?= date('Y')?> Wise Engineering</footer>
</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
