<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="contact">
	<table class="table">
	<tr class="table_top">
		<th class="first">
			<span>All</span>
		</th>
		<th>First Name
			<span data-sort="FirstNameUp" class="
			<?= (Yii::$app->request->get('first') == 'FirstNameUp') ? 'active_sortFirst' : 'sort' ?>
			">&#xf062</span>
			<span data-sort="FirstNameDown" class="
			<?= (Yii::$app->request->get('first') == 'FirstNameDown') ? 'active_sortFirst' : 'sort' ?>
			">&#xf063</span>
		</th>
		<th>Last Name
			<span data-sort="LastNameUp" class="
			<?= (Yii::$app->request->get('second') == 'LastNameUp') ? 'active_sortSecond' : 'sort' ?>
			">&#xf062</span>
			<span data-sort="LastNameDown" class="
			<?= (Yii::$app->request->get('second') == 'LastNameDown') ? 'active_sortSecond' : 'sort' ?>
			">&#xf063</span>
		</th>
		<th>E-mail
		
		</th>
		<th>Cellular
		
		</th>
		</tr>
		<tbody>
	<?php foreach ( $contacts as $contact ) : ?>
			<tr>
				<td>
					<?php $form = ActiveForm::begin(); ?>
	
	    		<?= $form->field($model, 'checkbox')->checkbox(['data' => $contact['id'], 'class' => 'check', 'name' => $contact['id'], 'value' => $contact['Email'], 'label' => '']) ?>
	
					<?php ActiveForm::end(); ?>
				</td>
				<td><?= $contact['FirstName']; ?></td>
				<td><?= $contact['LastName']; ?></td>
				<td><?= $contact['Email']; ?></td>
				<td><?= $contact['Telephone']; ?></td>
					
		<?php endforeach;?>
			</tr>
		</tbody>
		</table>
	<div class="bottom"></div>
	<div class="pagination">
		<?= LinkPager::widget([
				'pagination' => $pagination, 
				'maxButtonCount' => MAXBUTTONCOUNT,
				'firstPageLabel' => '&#xf04a',
				'lastPageLabel' => '&#xf04e',
				'nextPageLabel' => '',
				'prevPageLabel' => ''
		]) ?>
	</div>
</div>