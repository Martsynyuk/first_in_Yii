<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Information;

class ContactsController extends Controller
{
	public function Authenticate()
	{
		if(empty(Yii::$app->user->identity))
		{
			$this->redirect('/users/autorization/');
		}
	}
	
	public function actionIndex()
	{
		
		$this->authenticate();
		
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
		$this->authenticate();
		
		$model = new Information();
		
		if($model->load(Yii::$app->request->post()) && $model->validate())
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
	
	public function actionEdit()
	{
		$this->authenticate();
		
		$model = new Information();
		
		$contact = (new \yii\db\Query())
			->select('*')
			->from('Information')
			->where(['users_id' => Yii::$app->user->id, 'id' => Yii::$app->request->get('id')])
			->one();
		
			if(!$contact)
			{
				$this->redirect('/');
			}
		
		if($model->load(Yii::$app->request->post()) && $model->validate())
		{
			(new \yii\db\Query())->createCommand()->update('Information', [
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
			], ['id' => Yii::$app->request->get('id')])
			->execute();
				
			$this->redirect('/');
		}
		
		return $this->render('editcontact', ['model' => $model, 'contact' => $contact]);
	}
	
	public function actionView()
	{
		$this->authenticate();
		
		$contact = (new \yii\db\Query())
		->select('*')
		->from('Information')
		->where(['users_id' => Yii::$app->user->id, 'id' => Yii::$app->request->get('id')])
		->one();
		
		if(!$contact)
		{
			$this->redirect('/');
		}
		
		return $this->render('viewcontact', ['contact' => $contact]);
	}
	
	public function actionDelete()
	{
		$this->authenticate();
		
	}
	
	public function actionLetter()
	{
		$this->authenticate();
		
		$model = new Information();

		return $this->render('letter', ['model' => $model]);
	}
	
	public function actionSelect()
	{
		$this->authenticate();
		
		$model = new Information();
		
		$query = Information::find()->where(['users_id' => Yii::$app->user->id]);
		
		$pagination = new Pagination([
				'defaultPageSize' => ROWLIMIT,
				'totalCount' => $query->count(),
		
		]);
		
		$contacts = $query->orderBy('FirstName')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
		
		return $this->render('select', ['model' => $model, 'contacts' => $contacts, 'pagination' => $pagination]);
	}
}