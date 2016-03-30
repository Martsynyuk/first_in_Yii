<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<?php $this->params['menu'] = ['home', 'logout', 'accept'] ?>

<div class="contact">
	<table class="table">
		<tr class="table_top">
			<th class="first">
				<span>All</span>
			</th>
			<th>First Name
				<span data-sort="FirstNameUp" class="active_sort">&#xf062</span>
				<span data-sort="FirstNameDown" class="sort">&#xf063</span>
			</th>
			<th>Last Name
				<span data-sort="LastNameUp" class="active_sort">&#xf062</span>
				<span data-sort="LastNameDown" class="sort">&#xf063</span>
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

    		<?= $form->field($model, 'checkbox')->checkbox(['class' => 'checkbox', 'name' => $contact['id'], 'value' => $contact['id'], 'label' => '']) ?>

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