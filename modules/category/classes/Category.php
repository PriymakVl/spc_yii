<?php

namespace app\modules\category\classes;

use app\modules\category\classes\CategoryBase;
use app\modules\product\classes\Product;
use app\models\Image;
use app\modules\filter\classes\Filter;
use app\modules\category\classes\CategoryFilter;

class Category extends CategoryBase {

	public function getProducts()
	{
		$products = (new Product)->selectByIdCategory($this->id);
		if ($products) $this->callMethods($this->products, ['getImage', 'getPrice']);
		return $products;
	}

	public function getChildren()
	{
		return $this->selectByIdParent($this->id);
	}

    public function getImage()
    {
        return (new Image)->get($this->id_img);
    }

    public function getFilters()
    {
    	$ids = CategoryFilter::find()->select(['id_filter'])->where(['id_cat' => $this->id, 'status' => self::STATUS_ACTIVE])->asArray()->column();
    	return Filter::findAll([id => $ids, 'status' => self::STATUS_ACTIVE]);
    }
   
}
