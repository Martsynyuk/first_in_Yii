<?php
namespace app\models;

use yii\db\ActiveRecord;

class Information extends ActiveRecord
{
	public $radio;
	
	public function rules()
	{
		return [
				
				[['FirstName', 'LastName', 'Email', 'BirthDate'], 'required'],
				['Email', 'email']
		];
	}
}