<?php

namespace app\modules\category\classes;

use app\models\ModelBase;
use app\modules\category\traits\CategoryList; 
use app\modules\category\traits\CategoryModel; 
use app\modules\category\traits\CategoryConvert; 


class CategoryBase extends ModelBase {

	use CategoryList, CategoryModel, CategoryConvert;
   
    public $image;
    
    public static function tableName()
    {
        return '{{categories}}';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'id_parent' => 'Родитель',
            'description' => 'Описание',
            'filters' => 'Фильтры',
        ];
    }





}
