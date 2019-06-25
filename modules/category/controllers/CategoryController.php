<?php

	namespace app\modules\category\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\controllers\BaseController;
	
class CategoryController extends BaseController {


	public function actionIndex()
	{
		$cat = (new Category)->get($this->request->get('id_cat'))->getChildren()->getProducts();
		return $this->render('index/main', compact('cat'));
	}

}