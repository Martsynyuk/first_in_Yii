<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegistrationForm;
use app\models\LoginForm;

Class UsersController extends Controller
{
	public $layout = 'main';
	
	public function actionAutorization()
	{
		$model = new LoginForm();
		return $this->render('autorization', ['model' => $model]);
	}
	
	public function actionRegistration()
	{
		$model = new RegistrationForm();
		
		if ($model->load(Yii::$app->request->post()) && $model->validate()) 
		{
			return $this->render('registration', ['model' => $model]);
		}
		else{
			return $this->render('registration', ['model' => $model]);
		}
		
	}
}