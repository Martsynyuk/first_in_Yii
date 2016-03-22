<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
	const SCENARIO_LOGIN = 'login';
	const SCENARIO_REGISTER = 'registration';

	public $confirm_password;
	
	/**
	 * @return string the name of the table associated with this ActiveRecord class.
	 */
	public static function tableName()
	{
		return 'users';
	}
	
	public function rules()
	{
		return [
			// username, email and password are all required in "register" scenario
			[['login', 'password', 'confirm_password'], 'required', 'on' => self::SCENARIO_REGISTER],
	
			// username and password are required in "login" scenario
			[['login', 'password'], 'required', 'on' => self::SCENARIO_LOGIN],
				
			['password', 'compare', 'compareAttribute' => 'confirm_password', 'on' => self::SCENARIO_REGISTER],
			
			['login', 'unique', 'on' => self::SCENARIO_REGISTER],
		];
	}
}