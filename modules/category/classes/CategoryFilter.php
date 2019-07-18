<?php

namespace app\modules\category\classes;

use app\models\ModelBase;

class CategoryFilter extends ModelBase {

	public static function tableName()
    {
        return '{{categories_filters}}';
    }



    public function selectByIdCategory($id_cat)
    {
        return self::find()->select('id_filter')->where(['id_cat' => $id_cat, 'status' => self::STATUS_ACTIVE])->asArray()->column();
    }
   
}
