<?php

namespace app\modules\product\controllers;

use app\controllers\BaseController;
use app\modules\product\classes\Product;


class ProductController extends BaseController
{

    public function actionIndex()
    {
		$product = (new Product)->get($this->request->get('id_prod'));
    	$this->view->title = $product->code;
		return $this->render('index/main');
    }
}
