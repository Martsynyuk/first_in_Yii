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
				['Email', 'email'],
				[['Zip'], 'integer'],
				['Home', 'match', 'pattern' => '/^[+0-9][0-9-]+$/'] 
		];
	}
}