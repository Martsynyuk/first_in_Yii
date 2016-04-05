<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<?php $this->params['menu'] = ['autorization', 'registration'] ?>
<div class="content_autorization">
<span>Authorization</span>
	<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->label('Login :') ?>
    <?= $form->field($model, 'password')->passwordInput()->label('Password :') ?>
<div class="clear"></div>
<a class="a_top" href="<?= Url::to('#')?>">Forgot password ?</a>
<a href="<?= Url::to('/users/registration')?>">Register Now</a>
    <div class="form-group">
        <?= Html::submitButton('authorization', ['class' => 'btn btn-inverse']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>


