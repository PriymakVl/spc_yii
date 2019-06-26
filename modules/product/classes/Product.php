<?php

namespace app\modules\product\classes;

use app\modules\product\classes\ProductBase;
use app\modules\product\models\ProductModel;


class Product extends ProductBase {

	use ProductModel;

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
