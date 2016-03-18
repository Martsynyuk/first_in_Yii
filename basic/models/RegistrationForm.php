<?php
namespace app\models;

use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{
	public $username;
	public $password;
	
	public function rules()
	{
		return [
				[['username', 'password'], 'required']			
		];
	}
}