<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class UserWidget extends Widget
{
	public $menu;

	public function init()
	{
		parent::init();
		if ($this->menu === null) {
			$this->menu = 'autorization';
		}
	}

	public function run()
	{
		return Html::encode($this->menu);
	}
}