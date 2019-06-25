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
   
}
