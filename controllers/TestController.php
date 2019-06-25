<?php

	namespace app\controllers;
	
class TestController extends BaseController {
	
	public $layout = 'test';

	public function actionIndex()
	{
		$this->view->title = 'Главная';
		return $this->render('index/main');
	}
}