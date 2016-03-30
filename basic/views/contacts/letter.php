<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<?php $this->params['menu'] = ['home', 'logout'] ?>

<div class="letter">

	<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'letter')->input('text', ['placeholder' => 'write some e-mail'])->label('') ?>
    <a href="<?= Url::to('/contacts/select'); ?>">Add email from contacts</a>
    <?= $form->field($model, 'letter')->textarea(['placeholder' => 'write some text', 'class' => 'placeholder'])->label('') ?>

    <div class="form-group">
        <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>