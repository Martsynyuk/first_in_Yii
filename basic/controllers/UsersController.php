<?php

namespace app\controllers;

use yii\web\Controller;

Class UsersController extends Controller
{
	public $layout = 'first';
	
	public function actionIndex()
	{
	
		return $this->render('index', []);
	}
}