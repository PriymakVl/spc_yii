<?php

namespace app\models;

use app\models\ModelBase;

class OrderProduct extends ModelBase {


    public function rules()
    {
        return [
            [['id_prod', 'id_customer', 'qty'], 'integer'],
            [['id_cat', 'diameter', 'length', 'qty'], 'required'],
            [['magneto', 'thread_rod'], 'string'],
        ];
    }

	public static function tableName()
    {
        return '{{orders_products}}';
    }

   
}
