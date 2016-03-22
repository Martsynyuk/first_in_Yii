<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegistrationForm;
use app\models\User;
use app\models\Auth;

Class UsersController extends Controller
{
	public $layout = 'main';
	
	public function actionAutorization()
	{
		$model = new User();
		$model->scenario = User::SCENARIO_LOGIN;
		
		if($model->load(Yii::$app->request->post()) && $model->validate()) {
			
			$user = User::findOne(['login' => Yii::$app->request->post()['User']['login']]);
			
			if (Yii::$app->getSecurity()->validatePassword(Yii::$app->request->post()['User']['password'], $user->password)) {
				Yii::$app->user->login($user);
				$this->redirect('/contacts');
			} else {
				$model->addError('password', 'Wrong password');
			}
			
		}
		
		return $this->render('autorization', ['model' => $model]);
	}
	
	public function actionRegistration()
	{
		$model = new User();
		$model->scenario = User::SCENARIO_REGISTER;
		
		if($model->load(Yii::$app->request->post()) && $model->validate()) 
		{
			$model->password = Yii::$app->getSecurity()->generatePasswordHash(Yii::$app->request->post()['User']['password']);
			$model->save(false);
			
			$this->redirect('/users/autorization');
		}
		else{
			return $this->render('registration', ['model' => $model]);
		}
		
	}
}