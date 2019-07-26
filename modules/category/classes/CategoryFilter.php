<?php

namespace app\modules\category\classes;

use app\models\ModelBase;
use app\helpers\Helper;

class CategoryFilter extends ModelBase {

	public static function tableName()
    {
        return '{{categories_filters}}';
    }



    public function selectByIdCategory($id_cat)
    {
        return self::find()->select('id_filter')->where(['id_cat' => $id_cat, 'status' => self::STATUS_ACTIVE])->asArray()->column();
    }

    public static function saveFilters($form)
    {
    	$filters_exist = self::find()->where(['id_cat' => $form->id_cat, 'status' => self::STATUS_ACTIVE])->all();
    	if ($filters_exist) Helper::callMethods($filters_exist, ['delete']);
    	foreach ($form->filters_new as $id_filter) {
    		self::saveFilter($id_filter, $form->id_cat);
    	}
    	return true;
    }

    private static function saveFilter($id_filter, $id_cat)
    {
    	$object = new self();
    	$object->id_filter = $id_filter;
    	$object->id_cat = $id_cat;
    	$object->save();
    }
   
}
