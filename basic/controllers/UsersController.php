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
			
			$hash = User::findOne(['login' => Yii::$app->request->post()['User']['login']])->password;
			
			if (Yii::$app->getSecurity()->validatePassword(Yii::$app->request->post()['User']['password'], $hash)) {
		
				$user = Auth::findOne(['login' => Yii::$app->request->post()['User']['login']]);
				Yii::$app->user->login($user);
				
				var_dump(Yii::$app->user->id);
				die;
				
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