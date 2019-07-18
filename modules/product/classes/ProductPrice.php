<?php

namespace app\modules\product\classes;

use app\models\ModelBase;

class ProductPrice extends ModelBase {

	public static function tableName()
    {
        return '{{products_prices}}';
    }

    public function selectByIdProduct($id_prod)
    {
        return self::find()->where(['id_prod' => $id_prod])->limit(1)->one();
    }
   
}
