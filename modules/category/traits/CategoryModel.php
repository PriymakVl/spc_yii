<?php

namespace app\modules\category\traits;

trait CategoryModel {

    public function selectByIdParent($id_parent = false)
    {
    	return self::find()->where(['id_parent' => $id_parent, 'status' => self::STATUS_ACTIVE])->all();
    }

    public function getForSelect($id_parent = false)
    {
        $params = ['status' => self::STATUS_ACTIVE, 'id_parent' => $id_parent];
        $cats = self::find()->select(['name', 'id'])->where($params)->asArray()->indexBy('id')->column();
    }

}