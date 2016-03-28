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
    <?= $form->field($model, 'Home')->input('text', ['value' => $contact['Home']])->label('Home :' .
    		$form->field($model, 'radio')->radio(['name' => 'radio', 'value' => 'Home', 'label' => '']))?>
  </li>
  <li>
    <?= $form->field($model, 'Work')->input('text', ['value' => $contact['Work']])->label('Work :' .
    		$form->field($model, 'radio')->radio(['name' => 'radio', 'value' => 'Work', 'label' => ''])) ?>
  </li>
  <li>
    <?= $form->field($model, 'Cell')->input('text', ['value' => $contact['Cell']])->label('Cell :' .
    		$form->field($model, 'radio')->radio(['name' => 'radio', 'value' => 'Cell', 'label' => ''])) ?>
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
	  	<?php $birthdate = (date_parse ( $contact['BirthDate'] ));?>
			<?php $day[$birthdate['day']] = $birthdate['day']?>
			<?php $month[$birthdate['month']] = $birthdate['month']?>
			<?php $year[$birthdate['year']] = $birthdate['year']?>
			
	  	<?php for($i = 1; $i <= 31; $i++) : ?>
	  	<?php $day[$i] = $i ?>
	  	<?php endfor; ?>
	    <?= $form->field($model, 'date')->dropDownList($day, ['name' => 'day'])->label('BirthDate :');?>	
	    
	    <?php for($i = 1; $i <= 12; $i++) : ?>
	  	<?php $month[$i] = $i ?>
	  	<?php endfor; ?>	
	  	<?= $form->field($model, 'date')->dropDownList($month, ['name' => 'month'])->label('');?>	
	  	
	  	<?php for($i = idate("Y")-100; $i <= idate("Y")-18; $i++) : ?>
			<?php $year[$i] = $i ?>						
			<?php endfor; ?>
			<?= $form->field($model, 'date')->dropDownList($year, ['name' => 'year'])->label('');?>						
			
	  </li>
</ul>  
    <div class="form-group">
        <?= Html::submitButton('&#xf0a4 Done', ['class' => 'button_submit btn btn-inverse	', 'value' => 'Done']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>