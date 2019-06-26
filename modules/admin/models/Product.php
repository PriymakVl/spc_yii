<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\ProductBase;
use app\modules\category\classes\Category;


class Product extends ProductBase
{

	public $test;
   

    public function delete()
    {
        $this->status = 0;
        $this->save();
        return $this;
    }

    public function getCategory()
    {
    	return Category::findOne($this->id_cat);
    }
}
