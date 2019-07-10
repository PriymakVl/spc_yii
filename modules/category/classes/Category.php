<?php

namespace app\modules\category\classes;

use app\modules\category\classes\CategoryBase;
use app\modules\product\classes\Product;
use app\models\Image;

class Category extends CategoryBase {

	public $products;
	public $children;
	public $image;

	public function getProducts()
	{
		$this->products = (new Product)->selectByIdCategory($this->id);
		return $this;
	}

	public function getChildren()
	{
		$this->children = $this->selectByIdParent($this->id);
		return $this;
	}

    public function getImage()
    {
        $this->image = (new Image)->get($this->id_img);
        return $this;
    }
   
}
