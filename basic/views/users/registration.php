<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $this->params['menu'] = ['autorization', 'registration'] ?>
<div class="content_autorization">
	<?php $form = ActiveForm::begin(); ?>
<span>Registration</span>
    <?= $form->field($model, 'login')->label('login :') ?>
    <?= $form->field($model, 'password')->passwordInput()->label('password :') ?>
    <?= $form->field($model, 'confirm_password')->passwordInput()->label('password :') ?>
 
<div class="clear"></div>
    <div class="form-group">
        <?= Html::submitButton('registration', ['class' => 'btn btn-inverse']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>