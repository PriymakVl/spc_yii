<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\ProductBase;


class Product extends ProductBase
{
   

    public function delete()
    {
        $this->status = 0;
        $this->save();
    }
}
