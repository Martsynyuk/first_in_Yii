<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\EntryForm;

Class UsersController extends Controller
{
	public $layout = 'main';
	
	public function actionAutorization()
	{
		$model = new EntryForm();
		return $this->render('autorization', ['model' => $model]);
	}
}