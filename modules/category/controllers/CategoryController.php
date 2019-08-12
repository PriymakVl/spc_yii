<?php

	namespace app\modules\category\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\modules\product\classes\Product;
	use app\controllers\BaseController;
	use yii\data\Pagination;
	use app\helpers\Helper;
	use yii\helpers\ArrayHelper;
	use app\modules\filter\Filter;
	
class CategoryController extends BaseController {


	public function actionIndex($id_cat)
	{
		$cart = $this->session->get('cart');
		$cat = Category::findOne(['id' => $id_cat, 'status' => self::STATUS_ACTIVE]);
		if ($cat->products) return $this->actionProducts($cat);
		return $this->render('index/main', compact('cat'));
	}

	private function actionProducts($category)
	{
		$cat = $category;
		$query = Product::find()->where(['id_cat' => $id_cat, status => self::STATUS_ACTIVE]);
		$pages = new Pagination(['defaultPageSize' => 6, 'totalCount' => $query->count()]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();
		return $this->render('index/main', compact('cat', 'pages', 'products'));
	}

	public function actionFilter($id_cat)
    {
    	$cat = Category::findOne($id_cat); 
        $products = (new Product)->filter($cat);
        return $this->render('index/main', compact('cat', 'products'));
    }

}