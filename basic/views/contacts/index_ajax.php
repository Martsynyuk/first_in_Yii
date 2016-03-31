<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<div class="contact">
	<div id=delete_contact>
		<span id="close">X</span> 
		<span id="text"></span>
		<span id="yes">Yes</span>
		<span id="no">No</span>
		<p id="countdown">windows close - <span></span></p>
	</div>
	<table class="table">
		<tr class="table_top">
			<th></th>
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
			<th class="action">Action
			
			</th>
		</tr>
	<tbody>
	<?php foreach ( $contacts as $contact ) : ?>
		<tr>
		<td><?= $i . '.'; ?></td>
							<td><?= $contact['FirstName']; ?></td>
							<td><?= $contact['LastName']; ?></td>
							<td><?= $contact['Email']; ?></td>
							<td><?= $contact['Telephone']; ?></td>
							<td>
								<a class="edit" href="<?= Url::to(['/contacts/edit/', 'id' => $contact['id']]) ?>">edit</a> 
								<a class="view" href="<?= Url::to(['/contacts/view/', 'id' => $contact['id']]) ?>">view</a>
								<span data="<?= $contact['id'] . ', ' . $contact['FirstName']?>" class="delete" href="<?= Url::to(['/contacts/delete/', 'id' => $contact['id']]) ?>"></span>
							</td>
				
					<?php $i++;?>
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