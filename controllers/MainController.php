<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	
class MainController extends BaseController {

	public function actionIndex()
	{
		$this->view->title = 'Пневмооборудование';
		return $this->render('index');
	}
}