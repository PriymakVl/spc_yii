<?php

namespace app\modules\product\models;

trait ProductModel {

	public function selectByIdCategory($id_cat)
    {
    	return self::find()->where(['id_cat' => $id_cat, 'status' => self::STATUS_ACTIVE])->all();
    }

}