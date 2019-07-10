<?php

namespace app\modules\category\classes;

use app\models\ModelBase;
use app\modules\category\traits\CategoryList; 
use app\modules\category\traits\CategoryModel; 


class CategoryBase extends ModelBase {

	use CategoryList, CategoryModel;
   
    public $image;
    
    public static function tableName()
    {
        return '{{categories}}';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'full_name' => 'Полное название',
            'id_parent' => 'Родитель',
        ];
    }





}
