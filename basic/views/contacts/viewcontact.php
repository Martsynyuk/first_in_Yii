<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<?php $this->params['menu'] = ['home', 'logout'] ?>

<div class="contact_field">
<p>Information</p>
<?php $birthdate = (date_parse ( $contact['BirthDate'] ));?>
<ul>
	<li>
		<span>FirstName - </span><span class="info"><?= $contact['FirstName']?></span>
	</li>
	<li>
		<span>LastName - </span><span class="info"><?= $contact['LastName']?></span>
	</li>
	<li>
		<span>Email - </span><span class="info"><?= $contact['Email']?></span>
	</li>
	<li>
		<span>Home - </span><span class="info"><?= $contact['Home']?></span>
	</li>
	<li>
		<span>Work - </span><span class="info"><?= $contact['Work']?> </span>
	</li>
	<li>
		<span>Cell - </span><span class="info"><?= $contact['Cell']?> </span>
	</li>
	<li>
		<span>Adress1 - </span><span class="info"><?= $contact['Adress1']?></span>
	</li>
	<li>
		<span>Adress2 - </span><span class="info"><?= $contact['Adress2']?></span>
	</li>
	<li>
		<span>City - </span><span class="info"><?= $contact['City']?></span>
	</li>
	<li>
		<span>State - </span><span class="info"><?= $contact['State']?></span>
	</li>
	<li>
		<span>Zip - </span><span class="info"><?= $contact['Zip']?></span>
	</li>
	<li>
		<span>Country - </span><span class="info"><?= $contact['Country']?></span>
	</li>
	<li>
		<span>BirthDate - </span><span class="info"><?= $birthdate['day'] . ' . ' . $birthdate['month'] . ' . ' . $birthdate['year']?></span>
	</li>
</ul>
</div>