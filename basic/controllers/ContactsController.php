<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Information;
use yii\base\Request;
use yii\filters\AccessControl;


class ContactsController extends Controller
{
	public $layout = 'main';
	
	public function behaviors()
	{
		return [
				'access' => [
						'class' => AccessControl::className(),
						'denyCallback' => function(){
						$this->redirect('/users/autorization');
						},
						'only' => ['index', 'add', 'edit', 'view', 'delete', 'letter', 'select'],
						'rules' => [
								[
									'actions' => ['index', 'add', 'edit', 'view', 'delete', 'letter', 'select'],
									'allow' => true,
									'roles' => ['@'],
								],
						],
				],
	
		];
	}
	
	public function actionIndex()
	{
			
		$query = Information::find()->where(['users_id' => Yii::$app->user->id]);
		
		$pagination = new Pagination([
				'defaultPageSize' => ROWLIMIT,
				'totalCount' => $query->count(),
				
		]);
	
		$sort = 'FirstName, LastName';
		
		if(Yii::$app->request->isAjax)
		{
			$sort = $this->Sort_contacts();
		}
		
		$contacts = $query->orderBy($sort)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
		$i = 1; // count for contacts
		if($pagination->getPage() == 1 or $pagination->getPage() > 1)
		{
			$i = ($pagination->getPage()+1) * ROWLIMIT - ROWLIMIT + 1;
		}
		
		if(Yii::$app->request->isAjax)
		{
			return $this->renderAjax('index_ajax', ['contacts' => $contacts, 'i' => $i, 'pagination' => $pagination ]);
		}
		else{
			return $this->render('index', ['contacts' => $contacts, 'i' => $i, 'pagination' => $pagination ]);
		}
		
	}
	
	public function actionAdd()
	{
		$model = new Information();
		$model->radio = 'Work';
		
		if($model->load(Yii::$app->request->post()) && $model->validate())
		{
			
			$model->Telephone = $this->Select_telephone();
			$model->users_id = Yii::$app->user->id;
			$model->save();
			
			$this->redirect('/');
		}

		return $this->render('addcontact', ['model' => $model]);
	}
	
	public function actionEdit()
	{
		
		$model = Information::findOne(Yii::$app->request->get('id'));
		$model->radio = 'Work';

		if(!$model)
		{
			$this->redirect('/');
		}
			
		switch ($model['Telephone'])
		{
			case 'Home':
				$model->radio = 'Home';
				break;
			case 'Work':
				$model->radio = 'Work';
				break;
			case 'Cell': 
				$model->radio = 'Cell';
				break;
		}
		
		if($model->load(Yii::$app->request->post()) && $model->validate())
		{
			
			$model->users_id = Yii::$app->user->id;
			$model->update();
			$this->redirect('/');
		}
		
		return $this->render('editcontact', ['model' => $model]);
	}
	
	public function actionView()
	{
			
		$contact = Information::find()->
			where(['users_id' => Yii::$app->user->id, 'id' => Yii::$app->request->get('id')])->
			one();
		
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
		
		if(isset(Yii::$app->request->post()['Information']['letter']))
		{
			if(!empty(Yii::$app->request->cookies->getValue('mail')))
			{
				Yii::$app->response->cookies->add(new \yii\web\Cookie([
						'name' => 'mail',
						'value' => ''
				]));
			}
			
			$this->redirect('/');
		}
		
		$mails = NULL;
		
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

		return $this->render('letter', ['model' => $model, 'mails' => $mails]);
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
		
		if(Yii::$app->request->isAjax)
		{
			return $this->renderAjax('select_ajax', ['model' => $model, 'contacts' => $contacts, 'pagination' => $pagination]);
		}
		else{
			return $this->render('select', ['model' => $model, 'contacts' => $contacts, 'pagination' => $pagination]);
		}
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
	
	public function Select_telephone()
	{
		$telephone = '';

		switch (Yii::$app->request->post()['Information']['radio'])
		{
			case 'Home':
				$telephone = 'Home';
				break;
			case 'Work':
				$telephone = 'Work';
				break;
			case 'Cell':
				$telephone = 'Cell';
				break;
		}
		
		return $telephone;
	}
	
}