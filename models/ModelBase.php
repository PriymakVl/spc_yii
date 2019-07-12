<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\helpers\Helper;

class ModelBase extends ActiveRecord {

    const ID_PARENT_MAIN = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_UNACTIVE = 0;

    public $children;
    public $parent;

    public function get($id)
    {
        $object =  static::find()->where(['id' => $id, 'status' => static::STATUS_ACTIVE])->limit(1)->one();
        if (!$object) throw new \yii\base\Exception('Нет данных в базе для этого объекта');
        else return $object;
    }

	public function  callMethods( array $array, array $methods) 
    {
        return Helper::callMethods($array, $methods);
    }

    public function callMethod($object, $methods)
    {
        return Helper::callMethod($object, $methods);
    }

    public function getChildren()
    {
    	$this->children = $this->getByIdParentModel($this->id);
    	return $this;
    }

    public function getParent()
    {
        if ($this->id_parent) $this->parent = $this->get($this->id_parent);
        return $this;
    }

    public function getByIdParentModel($id_parent = false)
    {
        $id_parent = ($id_parent === false) ? $this->id_parent : $id_parent; 
    	return self::find()->where(['id_parent' => $id_parent, 'status' => self::STATUS_ACTIVE])->all();
    }

    public function delete()
    {
        $this->status = 0;
        $this->save();
        return $this;
    }


}