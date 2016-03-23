<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Information;

class ContactsController extends Controller
{
	public function actionIndex()
	{
		
		$query = Information::find()->where(['users_id' => Yii::$app->user->id]);
		
		$pagination = new Pagination([
				'defaultPageSize' => 1,
				'totalCount' => $query->count(),
				
		]);
		
		$contacts = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
		//echo '<pre>'; var_dump($pagination); echo '</pre>'; 
		$i = 1; // count for contacts
		
		return $this->render('index', ['contacts' => $contacts, 'i' => $i, 'pagination' => $pagination ]);
	}
}