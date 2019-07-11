<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	// use app\modules\product\classes\Product;
	
class MainController extends BaseController {

	public function actionIndex()
	{
				$cats = (new Category)->getMain();
		debug($cats[5]->children);
		debugProp($cat->children, 'image');
		$this->view->title = 'Пневмооборудование';
		return $this->render('index');
	}

	public function actionContacts()
	{
		$this->view->title = 'Контакты';
		return $this->render('contacts/main');
	}

	public function actionSale()
	{
		$this->view->title = 'Акции';
		return $this->render('sale/main');
	}

}