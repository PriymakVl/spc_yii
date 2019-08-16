<?php

namespace app\models;

use app\models\ModelBase;
use app\modules\category\classes\Category;
use app\models\OrderCylinder;

class OrderProduct extends ModelBase {


	public static function tableName()
    {
        return '{{orders_products}}';
    }

    public function saveCart($id_order, $cart)
    {
        if (isset($cart['cylinders'])) OrderCylinder::saveCylinders($cart['cylinders'], $id_order);
    }

    // public function saveProducts($products, $type)
    // {
    //     foreach ($products as $item)
    //     {
    //         $product = new self;
    //         if ($type == self::TYPE_CYLINDER) {
    //             $code = (new Category)->get($item['id_cat'])->getCodeCylinder($item);
    //             debug($code);
    //         }
    //     }
    // }

    

   
}