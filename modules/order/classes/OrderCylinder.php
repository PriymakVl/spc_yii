<?php

namespace app\models;

use app\models\ModelBase;
use app\modules\category\classes\Category;

class OrderCylinder extends ModelBase {


	public static function tableName()
    {
        return '{{orders_cylinders}}';
    }

    public static function saveCylinders($cylinders, $id_order)
    {
        foreach ($cylinders as $item)
        {
            $cylinder = new self();
            $cylinder->code = (new Category)->get($item['id_cat'])->getCodeCylinder($item);
            $cylinder->id_order = $id_order;
            $cylinder->id_cat = $item['id_cat'];
            $cylinder->save();
        }
    }



   
}