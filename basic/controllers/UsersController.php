<?php

namespace app\controllers;

use yii\web\Controller;

Class UsersController extends Controller
{
	public $layout = 'first';
	
	public function actionIndex()
	{
		$text = 'some text';
		
		return $this->render('index', ['text' => $text]);
	}
}