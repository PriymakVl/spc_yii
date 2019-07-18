<?php

namespace app\models;

use app\models\ModelBase;
use app\modules\category\classes\CategoryFilter;

class Filter extends ModelBase {

	public $items;

	public static function tableName()
    {
        return '{{filters}}';
    }

    public function getForCategory($id_cat)
    {
    	$ids_arr = (new CategoryFilter)->selectByIdCategory($id_cat);
    	if ($ids_arr) return self::find()->select('name')->where(['id' => $ids_arr])->column();
    }

    public static function selectAllNames()
    {
    	return self::find()->select('name')->where(['status' => self::STATUS_ACTIVE])->column();
    }

    public function getItems()
    {
    	$this->items = (new FilterItem)->selectByIdFilter($this->id);
    	return $this;
    }

    public function selectByName($name)
    {
    	return self::find()->where(['name' => $name,  'status' => self::STATUS_ACTIVE])->limit(1)->one();
    }
   
}
