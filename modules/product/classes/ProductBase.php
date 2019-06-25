<?php

namespace app\modules\product\classes;

use app\models\ModelBase;

class ProductBase extends ModelBase {


    
    public static function tableName()
    {
        return '{{products}}';
    }




}
