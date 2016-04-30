<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<?php $this->params['menu'] = ['home', 'logout'] ?>
<div class="contact_field">
<p>Information</p>
	<?php $form = ActiveForm::begin(); ?>
<ul>
	<li>
    <?= $form->field($model, 'FirstName')->input('text', ['value' => $model['FirstName']])->label('FirstName :') ?>
  </li> 
  <li>
    <?= $form->field($model, 'LastName')->input('text', ['value' => $model['LastName']])->label('LastName :') ?>
  </li>
  <li>  
    <?= $form->field($model, 'Email')->input('email', ['value' => $model['Email']])->label('Email :') ?>
  </li>
  <li>
  	<?= $form->field($model, 'radio')->radio(['class' => 'radio', 'value' => 'Home', 'label' => 'Home :', 'uncheck' => null]) ?>
    <?= $form->field($model, 'Home')->input('text', ['value' => $model['Home']])->label('') ?>
  </li>
  <li>
  	<?= $form->field($model, 'radio')->radio(['class' => 'radio', 'value' => 'Work', 'label' => 'Work :', 'uncheck' => null]) ?>
    <?= $form->field($model, 'Work')->input('text', ['value' => $model['Work']])->label('') ?>
  </li>
  <li>
  	<?= $form->field($model, 'radio')->radio(['class' => 'radio', 'value' => 'Cell', 'label' => 'Cell :', 'uncheck' => null]) ?>
    <?= $form->field($model, 'Cell')->input('text', ['value' => $model['Cell']])->label('') ?>
  </li>
  <li>
    <?= $form->field($model, 'Adress1')->input('text', ['value' => $model['Adress1']])->label('Adress1 :') ?>
  </li>
  <li>
    <?= $form->field($model, 'Adress2')->input('text', ['value' => $model['Adress2']])->label('Adress2 :') ?>
  </li>
 	<li>
    <?= $form->field($model, 'City')->input('text', ['value' => $model['City']])->label('City :') ?>
  </li>
  <li>
    <?= $form->field($model, 'State')->input('text', ['value' => $model['State']])->label('State :') ?>
  </li>
  <li>
    <?= $form->field($model, 'Zip')->input('text', ['value' => $model['Zip']])->label('Zip :') ?>
  </li>
  <li>  
    <?= $form->field($model, 'Country')->input('text', ['value' => $model['Country']])->label('Country :') ?>
  </li>
	  <li>
	  	<?= $form->field($model, 'BirthDate')->input('text', ['value' => $model['BirthDate']])->label('BirthDate :');?>
	  </li>
</ul>  
    <div class="form-group">
        <?= Html::submitButton('&#xf0a4 Done', ['class' => 'button_submit btn btn-inverse	', 'value' => 'Done']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>