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
<p>FirstName - <?= $contact['FirstName']?></p>
<p>LastName - <?= $contact['LastName']?></p>
<p>Email - <?= $contact['Email']?></p>
<p>Home - <?= $contact['Home']?></p>
<p>Work - <?= $contact['Work']?> </p>
<p>Cell - <?= $contact['Cell']?> </p>
<p>Adress1 - <?= $contact['Adress1']?></p>
<p>Adress2 - <?= $contact['Adress2']?></p>
<p>City - <?= $contact['City']?></p>
<p>State - <?= $contact['State']?></p>
<p>Zip - <?= $contact['Zip']?></p>
<p>Country - <?= $contact['Country']?></p>
<p>BirthDate - <?= $birthdate['day'] . ' . ' . $birthdate['month'] . ' . ' . $birthdate['year']?></p>
<p></p>
<p></p>
</div>