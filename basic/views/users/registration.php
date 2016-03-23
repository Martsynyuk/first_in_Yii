<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="content_autorization">
	<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->label('login :') ?>
    <?= $form->field($model, 'password')->passwordInput()->label('password :') ?>
    <?= $form->field($model, 'confirm_password')->passwordInput()->label('password :') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>