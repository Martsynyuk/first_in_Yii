<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<?php $this->params['menu'] = ['home', 'logout'] ?>

<div class="letter">

	<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'letter')->input('text', 
    		['value' => (!empty($mails) ? $mails : ''), 
    		'placeholder' => 'write some e-mail'])->label('') ?>
    <a class="btn btn-inverse" href="<?= Url::to('/contacts/select'); ?>">&#xf0a4 Add email from contacts</a>
    <?= $form->field($model, 'letter')->textarea(['name' => 'text', 'placeholder' => 'write some text', 'class' => 'placeholder'])->label('') ?>

    <div class="form-group">
        <?= Html::submitButton('Add', ['class' => 'btn btn-inverse']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>