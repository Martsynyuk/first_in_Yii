<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Information;

/**
 * This command create sql query to DB.
 *
 *
 */
class TestController extends Controller
{
	/**
	 */
	
	public function actionIndex()
	{
		$test = Information::find()->select(['id', 'Home', 'Work', 'Cell', 'Telephone'])->all();
		
		foreach ($test as $val)
		{
			if($val['Home'] == $val['Telephone'])
			{
				$this->telephoneUpdate($val['id'], 'Home');
			}
			elseif($val['Work'] == $val['Telephone'])
			{
				$this->telephoneUpdate($val['id'], 'Work');
			}
			elseif($val['Cell'] == $val['Telephone'])
			{
				$this->telephoneUpdate($val['id'], 'Cell');
			}
		}
	}
	
	public function actionTest($argument)
	{
		var_dump($argument);
	}
	
	public function telephoneUpdate($id, $telephone)
	{
		$update = Information::findOne(['id' => $id]);
		$update->Telephone = $telephone;
		$update->update(false);
	}
}