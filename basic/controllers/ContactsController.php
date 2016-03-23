<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;

class ContactsController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}