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
				['Home', 'match', 'pattern' => '/[0-9-]/'] //http://www.yiiframework.com/doc-2.0/guide-tutorial-core-validators.html#match
		];
	}
}