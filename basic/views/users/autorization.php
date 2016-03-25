<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $this->params['menu'] = ['autorization', 'registration'] ?>
<div class="content_autorization">

	<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->label('Login :') ?>
    <?= $form->field($model, 'password')->passwordInput()->label('Password :') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>


