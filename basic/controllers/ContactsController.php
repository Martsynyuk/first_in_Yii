<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class ContactsController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}