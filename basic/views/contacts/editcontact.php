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
    <?= $form->field($model, 'FirstName')->input('text', ['value' => $contact['FirstName']])->label('FirstName :') ?>
  </li> 
  <li>
    <?= $form->field($model, 'LastName')->input('text', ['value' => $contact['LastName']])->label('LastName :') ?>
  </li>
  <li>  
    <?= $form->field($model, 'Email')->input('email', ['value' => $contact['Email']])->label('Email :') ?>
  </li>
  <li>
  	<?= $form->field($model, 'radio')->radio(['value' => 'Home', 'label' => 'Home :', 'uncheck' => null]) ?>
    <?= $form->field($model, 'Home')->input('text', ['value' => $contact['Home']])->label('Home :') ?>
  </li>
  <li>
  	<?= $form->field($model, 'radio')->radio(['value' => 'Work', 'label' => 'Work :', 'uncheck' => null]) ?>
    <?= $form->field($model, 'Work')->input('text', ['value' => $contact['Work']])->label('Work :') ?>
  </li>
  <li>
  	<?= $form->field($model, 'radio')->radio(['value' => 'Cell', 'label' => 'Cell :', 'uncheck' => null]) ?>
    <?= $form->field($model, 'Cell')->input('text', ['value' => $contact['Cell']])->label('') ?>
  </li>
  <li>
    <?= $form->field($model, 'Adress1')->input('text', ['value' => $contact['Adress1']])->label('Adress1 :') ?>
  </li>
  <li>
    <?= $form->field($model, 'Adress2')->input('text', ['value' => $contact['Adress2']])->label('Adress2 :') ?>
  </li>
 	<li>
    <?= $form->field($model, 'City')->input('text', ['value' => $contact['City']])->label('City :') ?>
  </li>
  <li>
    <?= $form->field($model, 'State')->input('text', ['value' => $contact['State']])->label('State :') ?>
  </li>
  <li>
    <?= $form->field($model, 'Zip')->input('text', ['value' => $contact['Zip']])->label('Zip :') ?>
  </li>
  <li>  
    <?= $form->field($model, 'Country')->input('text', ['value' => $contact['Country']])->label('Country :') ?>
  </li>
	  <li>
	  	<?= $form->field($model, 'date')->input('text', ['placeholder' => 'Year-month-day'])->label('BirthDate :');?>
	  </li>
</ul>  
    <div class="form-group">
        <?= Html::submitButton('&#xf0a4 Done', ['class' => 'button_submit btn btn-inverse	', 'value' => 'Done']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>