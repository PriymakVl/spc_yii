<?php

	namespace app\modules\category\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\controllers\BaseController;
	
class CategoryController extends BaseController {


	public function actionIndex($id_cat)
	{
		$cat = (new Category)->get($id_cat)->getChildren()->getProducts()->getImage();
		return $this->render('index/main', compact('cat'));
	}

}