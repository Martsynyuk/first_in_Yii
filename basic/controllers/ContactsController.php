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
				'defaultPageSize' => ROWLIMIT,
				'totalCount' => $query->count(),
				
		]);
		
		$contacts = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
		
		$i = 1; // count for contacts
		if($pagination->getPage() == 1 or $pagination->getPage() > 1)
		{
			$i = ($pagination->getPage()+1) * ROWLIMIT - ROWLIMIT + 1;
		}
		
		return $this->render('index', ['contacts' => $contacts, 'i' => $i, 'pagination' => $pagination ]);
	}
	
	public function actionAddcontact()
	{
		$model = new Information();

		return $this->render('addcontact', ['model' => $model]);
	}
	
	public function actionLetter()
	{

		return $this->render('letter');
	}
}