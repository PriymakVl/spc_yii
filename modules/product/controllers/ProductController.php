<?php

namespace app\modules\product\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\product\classes\Product;

class ProductController extends BaseController
{
	
    public function actionIndex($id_prod)
    {
        $product = (new Product)->get($id_prod);
        $this->view->title = $product->code;
        return $this->render('index/main');
    }
}
