<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\User;

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
		$test = new User();
		$test->login = 'merelin';
		$test->password = Yii::$app->getSecurity()->generatePasswordHash('123456');
		
		$test->insert();
	}

}