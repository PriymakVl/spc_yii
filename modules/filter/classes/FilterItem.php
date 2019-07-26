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

    public function getFilter()
    {
    	return Filter::findOne($this->id_filter);
    }

    public function rules()
    {
        return [
            ['name', 'required'],
            ['rating', 'integer'],
            ['id_filter', 'integer'],
        ];
    }

    public function saveFilterItem($form)
    {
    	$this->name = trim($form->name);
    	$this->rating = $form->rating;
        if (!$this->id_filter) $this->id_filter = $form->id_filter;
    	return $this->save();
    }
   
}
