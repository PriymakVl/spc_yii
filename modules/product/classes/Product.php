<?php

namespace app\modules\product\classes;

use app\modules\product\classes\ProductBase;
use app\modules\product\models\ProductModel;
use app\modules\product\filters\ProductFilter;
use app\modules\category\classes\Category;
use app\models\Image;
use app\modules\product\classes\ProductPrice;
use app\modules\product\traits\ProductAdminTrait;

class Product extends ProductBase {

	use ProductModel, ProductFilter, ProductAdminTrait;

    public $category;
    public $image;
    public $price;
    public $itemsFilters;

 	public function delete()
    {
        $this->status = 0;
        $this->save();
        return $this;
    }

    public function getCategory()
    {
        $this->category = (new Category)->get($this->id_cat);
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

    public function getItemsOfFilters()
    {
        $this->itemsFilters = (new ProductItemFilter)->getAll($this->id);
        return $this;
    }

    public function saveProduct($post)
    {
        $product = (object) $post['Product'];
        $this->name = $product->name;
        $this->preview = $product->preview;
        $this->description = $product->description;
        $this->updatePrice();
        $this->save();
    }

    private function updatePrice()
    {
        $price = (new ProductPrice)->selectByIdProduct($this->id);
        $price->value = $product->price;
        $price->save();
    }
   
}
