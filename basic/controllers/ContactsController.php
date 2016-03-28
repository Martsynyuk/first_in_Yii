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
		
		$contacts = $query->orderBy('FirstName')
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
		
		if($model->load(Yii::$app->request->post()) && $model->validate() && $model->validate())
		{
			(new \yii\db\Query())->createCommand()->insert('Information', [
					'users_id' => Yii::$app->user->identity['id'],
					'FirstName' => Yii::$app->request->post()['Information']['FirstName'],
					'LastName' => Yii::$app->request->post()['Information']['LastName'],
					'Email' => Yii::$app->request->post()['Information']['Email'],
					'Home' => Yii::$app->request->post()['Information']['Home'],
					'Work' => Yii::$app->request->post()['Information']['Work'],
					'Cell' => Yii::$app->request->post()['Information']['Cell'],
					'Adress1' => Yii::$app->request->post()['Information']['Adress1'],
					'Adress2' => Yii::$app->request->post()['Information']['Adress2'],
					'City' => Yii::$app->request->post()['Information']['City'],
					'State' => Yii::$app->request->post()['Information']['State'],
					'Zip' => Yii::$app->request->post()['Information']['Zip'],
					'Country' => Yii::$app->request->post()['Information']['Country'],
					'BirthDate' => Yii::$app->request->post()['year'] . '-' . Yii::$app->request->post()['month'] . '-'
						. Yii::$app->request->post()['day'],
					'Telephone' => ''
			])->execute();
			
			$this->redirect('/');
		}

		return $this->render('addcontact', ['model' => $model]);
	}
	
	public function actionLetter()
	{

		return $this->render('letter');
	}
}