<?php
namespace app\models;

use yii\db\ActiveRecord;

class Information extends ActiveRecord
{
	public $radio;
	public $date;
	
	public function rules()
	{
		return [
				
				[['FirstName', 'LastName', 'Email'], 'required'],
				['Email', 'email']
		];
	}
}