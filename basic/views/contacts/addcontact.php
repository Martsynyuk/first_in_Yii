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
    <?= $form->field($model, 'FirstName')->label('FirstName :') ?>
  </li> 
  <li>
    <?= $form->field($model, 'LastName')->label('LastName :') ?>
  </li>
  <li>  
    <?= $form->field($model, 'Email')->label('Email :') ?>
  </li>
  <li>
    <?= $form->field($model, 'Home')->label('Home :' .
    		$form->field($model, 'radio')->radio(['name' => 'radio', 'value' => 'Home', 'label' => '']))?>
  </li>
  <li>
    <?= $form->field($model, 'Work')->label('Work :' .
    		$form->field($model, 'radio')->radio(['name' => 'radio', 'value' => 'Work', 'label' => ''])) ?>
  </li>
  <li>
    <?= $form->field($model, 'Cell')->label('Cell :' .
    		$form->field($model, 'radio')->radio(['name' => 'radio', 'value' => 'Cell', 'label' => ''])) ?>
  </li>
  <li>
    <?= $form->field($model, 'Adress1')->label('Adress1 :') ?>
  </li>
  <li>
    <?= $form->field($model, 'Adress2')->label('Adress2 :') ?>
  </li>
 	<li>
    <?= $form->field($model, 'City')->label('City :') ?>
  </li>
  <li>
    <?= $form->field($model, 'State')->label('State :') ?>
  </li>
  <li>
    <?= $form->field($model, 'Zip')->label('Zip :') ?>
  </li>
  <li>  
    <?= $form->field($model, 'Country')->label('Country :') ?>
  </li>
  <li>
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