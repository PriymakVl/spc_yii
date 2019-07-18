<?php

	namespace app\modules\category\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\modules\product\classes\Product;
	use app\controllers\BaseController;
	use yii\data\Pagination;
	use app\helpers\Helper;
	use app\models\Filter;
	
class CategoryController extends BaseController {


	public function actionIndex($id_cat)
	{
		$cat = (new Category)->get($id_cat)->getChildren()->getParent();
		$query = Product::find()->where(['id_cat' => $id_cat, status => Product::STATUS_ACTIVE]);
		$pages = new Pagination(['defaultPageSize' => 6, 'totalCount' => $query->count()]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();
		if ($products) $products = Helper::callMethods($products, ['getImage', 'getPrice']);
		return $this->render('index/main', compact('cat', 'pages', 'products'));
	}

	public function actionFilter($id_cat)
    {
    	$cat = (new Category)->get($id_cat)->getChildren()->getParent();
        $products = (new Product)->filter($id_cat);
        return $this->render('index/main', compact('cat', 'products'));
    }

}