<?php

namespace app\models;

use app\models\ModelBase;

class FilterCategory extends ModelBase {

	public static function tableName()
    {
        return '{{filters_categories}}';
    }



    public function selectByIdCategory($id_cat)
    {
        return self::find()->select('id_filter')->where(['id_cat' => $id_cat, 'status' => self::STATUS_ACTIVE])->asArray()->column();
    }
   
}
