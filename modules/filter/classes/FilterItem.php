<?php

namespace app\modules\filter\classes;

use app\models\ModelBase;

class FilterItem extends ModelBase {

	public static function tableName()
    {
        return '{{filters_items}}';
    }

    public function selectByIdFilter($id_filter)
    {
    	return self::find()->where(['id_filter' => $id_filter, 'status' => self::STATUS_ACTIVE])->OrderBy(['rating' => SORT_DESC])->all();
    }
   
}
