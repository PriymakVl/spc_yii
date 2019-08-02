<?php

namespace app\modules\product\classes;

use app\modules\product\classes\ProductBase;
use app\modules\product\models\ProductModel;
use app\modules\product\filters\ProductFilter;
use app\modules\category\classes\Category;
use app\models\Image;
use app\modules\product\classes\ProductPrice;
use app\modules\product\traits\ProductAdminTrait;
use app\modules\filter\classes\FilterItem;

class Product extends ProductBase {

	use ProductModel, ProductFilter, ProductAdminTrait;

    public $itemsFilters;

 	public function delete()
    {
        $this->status = 0;
        $this->save();
        return $this;
    }

    public function getCategory()
    {
        if ($this->id_cat) return (new Category)->get($this->id_cat);
    }

    public function getImage()
    {
        if ($this->id_img) return (new Image)->get($this->id_img);
    }

    public function getPrice()
    {
        return (new ProductPrice)->selectByIdProduct($this->id);
    }

    public function getItemsFilters()
    {
        $this->itemsFilters = (new ProductItemFilter)->getAll($this->id);
        return $this;
    }

    public function saveProduct($form)
    {
        $this->name = $form->name;
        $this->preview = $form->preview;
        $this->description = $form->description;
        $this->IBLOCK_ID = 14;//1c bitrix
        // $this->updatePrice();
        return $this->save();
    }

    private function updatePrice()
    {
        $price = (new ProductPrice)->selectByIdProduct($this->id);
        $price->value = $product->price;
        $price->save();
    }

    public function getItemFilter($id_filter)
    {
        $item = ProductItemFilter::find()->where(['id_prod' => $this->id, 'id_filter' => $id_filter])->limit(1)->one();
        if (!$item) return;
        return FilterItem::findOne($item->id_item);
    }
   
}
