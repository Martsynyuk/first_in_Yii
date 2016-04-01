<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Information;
use yii\base\Request;

class ContactsController extends Controller
{
	public $layout = 'main';
	
	public function beforeAction($action)
	{
		$this->Authenticate();
		return true;
	}
	
	public function Authenticate()
	{
		if(empty(Yii::$app->user->identity))
		{
			$this->redirect('/users/autorization/');
		}
	}
	
	public function actionIndex_ajax()
	{
		
		$query = Information::find()->where(['users_id' => Yii::$app->user->id]);
		
		$pagination = new Pagination([
				'defaultPageSize' => ROWLIMIT,
				'totalCount' => $query->count(),
		
		]);
			
		$sort = $this->Sort_contacts();
		
		$contacts = $query->orderBy($sort)
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
		
		$i = 1; // count for contacts
		if($pagination->getPage() == 1 or $pagination->getPage() > 1)
		{
			$i = ($pagination->getPage()+1) * ROWLIMIT - ROWLIMIT + 1;
		}
		
		return $this->renderAjax('index_ajax', ['contacts' => $contacts, 'i' => $i, 'pagination' => $pagination ]);
	}
	
	public function actionIndex()
	{
			
		if(!empty(Yii::$app->request->cookies->getValue('mail')))
		{
			Yii::$app->response->cookies->add(new \yii\web\Cookie([
					'name' => 'mail',
					'value' => ''
			]));
		}
		
		$query = Information::find()->where(['users_id' => Yii::$app->user->id]);
		
		$pagination = new Pagination([
				'defaultPageSize' => ROWLIMIT,
				'totalCount' => $query->count(),
				
		]);
		
		$sort = 'FirstName, LastName';

		$this->Sort_contacts();
		
		$contacts = $query->orderBy($sort)
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
		
		$model->radio = 'Work';
		
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
					'BirthDate' => Yii::$app->request->post()['Information']['date'],
					'Telephone' => ''
			])->execute();
			
			$this->redirect('/');
		}

		return $this->render('addcontact', ['model' => $model]);
	}
	
	public function actionEdit()
	{
		
		$model = new Information();
		$model->radio = 'Work';
		
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
		
		$id = (int)(Yii::$app->request->get('contact'));
		
		(new \yii\db\Query())->createCommand()->delete('Information', 
				['users_id' => Yii::$app->user->identity['id'], 'id' => $id])->execute();
	}
	
	public function actionLetter()
	{
		
		if(!empty($_COOKIE['select']))
		{
			$contact_id = explode(', ', $_COOKIE['select']);
			setcookie('select', '' , strtotime("12 hours"), '/');
			
			foreach ($contact_id as $val)
			{		
				$mail[] = (new \yii\db\Query())
					->select('email')
					->from('Information')
					->where(['users_id' => Yii::$app->user->id, 'id' => (int)($val)])
					->one();
			}
			
			foreach ($mail as $val)
			{
				foreach ($val as $value)
				{
					$mails[] = $value;
				}
			}
			
			$mails = implode(', ', $mails);
			
			Yii::$app->response->cookies->add(new \yii\web\Cookie([
					'name' => 'mail',
					'value' => $mails
			]));
		}		

		if(!empty(Yii::$app->request->post()['Information']['letter']))
		{
			$new_mail = $this->Array_diff(explode(', ', Yii::$app->request->post()['Information']['letter']), /// array diff selected - writed
					explode(', ', Yii::$app->request->cookies->getValue('mail')));
		}
		
		$model = new Information();

		return $this->render('letter', ['model' => $model]);
	}
	
	public function actionSelect_ajax()
	{
		
		$model = new Information();
		
		$query = Information::find()->where(['users_id' => Yii::$app->user->id]);
		
		$pagination = new Pagination([
				'defaultPageSize' => ROWLIMIT,
				'totalCount' => $query->count(),
		
		]);
		
		$sort = $this->Sort_contacts();
		
		$contacts = $query->orderBy($sort)
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
		
		return $this->renderAjax('select_ajax', ['model' => $model, 'contacts' => $contacts, 'pagination' => $pagination]);
	}
	
	public function actionSelect()
	{
		
		$model = new Information();
		
		$query = Information::find()->where(['users_id' => Yii::$app->user->id]);
		
		$pagination = new Pagination([
				'defaultPageSize' => ROWLIMIT,
				'totalCount' => $query->count(),
		
		]);
		
		$sort = 'FirstName, LastName';
		
		$contacts = $query->orderBy($sort)
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
		
		return $this->render('select', ['model' => $model, 'contacts' => $contacts, 'pagination' => $pagination]);
	}
	
	public function Sort_contacts()
	{
		
		if( Yii::$app->request->get('first') === 'FirstNameUp')
		{
			$sort_first = 'FirstName';
		}
		if( Yii::$app->request->get('first') === 'FirstNameDown'){
				
			$sort_first = 'FirstName DESC';
		}
		if( Yii::$app->request->get('second') === 'LastNameUp')
		{
			$sort_second = ', LastName';
		}
		if( Yii::$app->request->get('second') === 'LastNameDown')
		{
			$sort_second = ', LastName DESC';
		}
		
		if(!empty($sort_first) && !empty($sort_second))
		{	
			$sort = $sort_first . $sort_second;
		
			return $sort;
		}
		else{
			return false;
		}
		
	}
	
	public function Array_diff($array1, $array2)
	{
		$array = array_diff($array1, $array2);
		
		return $array;
	}
}