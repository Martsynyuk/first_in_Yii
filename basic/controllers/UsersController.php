<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegistrationForm;
use app\models\User;
use yii\filters\AccessControl;

Class UsersController extends Controller
{
	public $layout = 'main';
	
	public function behaviors()
	{
		return [
				'access' => [
					'class' => AccessControl::className(),
					'denyCallback' => function(){
						$this->redirect('/');
					},
					'only' => ['autorization', 'registration', 'logout'],
					'rules' => [
							[
								'actions' => ['autorization', 'registration'],
								'allow' => true,
								'roles' => ['?'],
							],
							
							[
								'actions' => ['logout'],
								'allow' => true,
								'roles' => ['@'],
							],
										
					],
				],
				
		];
	}
	
	public function actionAutorization()
	{
		
		$model = new User();
		$model->scenario = User::SCENARIO_LOGIN;
		
		if($model->load(Yii::$app->request->post()) && $model->validate())
		{
			
			$user = User::findOne(['login' => Yii::$app->request->post()['User']['login']]);
			
			if(!empty($user))
			{
				if (Yii::$app->getSecurity()->validatePassword(Yii::$app->request->post()['User']['password'], $user->password)) {
					Yii::$app->user->login($user);
					$this->redirect('/');
				} else {
					
					$model->addError('login', 'Wrong login or password');
				}		
			}
			else{
				$model->addError('login', 'Wrong login or password');
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
	
	public function actionLogout()
	{	
		Yii::$app->user->logout();
		$this->redirect('/users/autorization');
	}
}