<?php

namespace app\modules\product\classes;

use app\modules\product\classes\ProductBase;
use app\modules\product\models\ProductModel;
use app\modules\category\classes\Category;
use app\models\Image;
use app\models\ProductPrice;


class Product extends ProductBase {

	use ProductModel;

    public $category;
    public $image;
    public $price;

 	public function delete()
    {
        $this->status = 0;
        $this->save();
        return $this;
    }

    public function getCategory()
    {
        $this->category = $this->getCategory();
        return $this;
    }

    public function getImage()
    {
        $this->image = (new Image)->get($this->id_img);
        return $this;
    }

    public function getPrice()
    {
        $this->price = (new ProductPrice)->selectByIdProduct($this->id);
        return $this;
    }
   
}
