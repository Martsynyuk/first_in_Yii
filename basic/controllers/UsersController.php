<?php

namespace app\controllers;

use yii\web\Controller;

Class UsersController extends Controller
{
	public $layout = 'main';
	
	public function actionIndex()
	{
		$text = 'some text';
		return $this->render('autorization', ['text' => $text]);
	}
}