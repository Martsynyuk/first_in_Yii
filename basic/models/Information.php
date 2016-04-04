<?php
namespace app\models;

use yii\db\ActiveRecord;

class Information extends ActiveRecord
{
	public $radio;
	public $date;
	public $letter;
	public $checkbox;
	
	public function rules()
	{
		return [
				
				[['FirstName', 'LastName', 'Email'], 'required'],
				[['FirstName', 'LastName'], 'match', 'pattern' => '/^[A-Z][a-z ]+$/'],
				['Email', 'email'],
				['Zip', 'integer'],
				[['Home', 'Cell', 'Work'], 'match', 'pattern' => '/^[+0-9][0-9-]+$/'],
				[['Adress1', 'Adress1'], 'match', 'pattern' => '^[A-Za-z0-9][A-Za-z0-9 -]+$/'],
				[['City', 'Country', 'State'], 'match', 'pattern' => '^[A-Z][A-Za-z -]+$/'],
				['date', 'required'],
				['date', 'safe'],
				['date', 'date', 'format' => 'php:Y-m-d', 'message' => 'wrong date']
		];
	}
}