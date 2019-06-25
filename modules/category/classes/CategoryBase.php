<?php

namespace app\modules\category\classes;

use app\models\ModelBase;
use app\modules\category\traits\CategoryList; 


class CategoryBase extends ModelBase {

	use CategoryList;
   
    public $image;
    
    public static function tableName()
    {
        return '{{categories}}';
    }




}
