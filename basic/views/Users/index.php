<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?= Html::encode($text); ?></br>
<?= $text; ?></br>
<a href="<?= Url::to(['/site/say']); ?>">Site/say</a>

