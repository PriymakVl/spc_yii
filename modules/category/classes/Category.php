<?php

namespace app\modules\category\classes;

use app\modules\category\classes\CategoryBase;
use app\modules\product\classes\Product;

class Category extends CategoryBase {

	public $products;

	public function getProducts()
	{
			$this->products = (new Product)->selectByIdCategory($this->id);
			return $this;
	}

	public function getForSelect($id_parent = false)
	{
		$params = ['status' => self::STATUS_ACTIVE, 'id_parent' => $id_parent];
		$cats = self::find()->select(['name', 'id'])->where($params)->asArray()->indexBy('id')->column();
	}
   
}
