<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

?>
<?php $this->params['menu'] = ['home', 'logout', 'addcontact', 'letter'] ?>

<div class="contact">
	<table class="table">
		<tr>
			<th></th>
			<th>First Name
			
			</th>
			<th>Last Name
			
			</th>
			<th>E-mail
			
			</th>
			<th>Cellular
			
			</th>
			<th>Action
			
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
								
							</td>
				
					<?php $i++;?>
	<?php endforeach;?>
		</tr>
	</tbody>
	</table>
	<?= LinkPager::widget([
			'pagination' => $pagination, 
			'maxButtonCount' => MAXBUTTONCOUNT,
			'firstPageLabel' => true,
			'lastPageLabel' => true
	]) ?>
</div>