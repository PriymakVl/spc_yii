<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	// use app\modules\product\classes\Product;
	
class MainController extends BaseController {

	public function actionIndex()
	{
		// $cats = Category::find()->all();
		// $sum = 0;
		// foreach ($cats as $cat) {
		// 	if (!$cat->description) continue;
		// 	str_replace('upload/medialibrary', 'web/images/medialibrary', $cat->description);
		// }
		// debug('exit');
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