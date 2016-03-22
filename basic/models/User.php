<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
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
	
	/**
	 * Finds an identity by the given ID.
	 *
	 * @param string|integer $id the ID to be looked for
	 * @return IdentityInterface|null the identity object that matches the given ID.
	 */
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}
	
	/**
	 * Finds an identity by the given token.
	 *
	 * @param string $token the token to be looked for
	 * @return IdentityInterface|null the identity object that matches the given token.
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne(['access_token' => $token]);
	}
	
	/**
	 * @return int|string current user ID
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @return string current user auth key
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}
	
	/**
	 * @param string $authKey
	 * @return boolean if auth key is valid for current user
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}
}