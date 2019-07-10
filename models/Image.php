<?php

namespace app\models;

use app\models\ModelBase;

class Image extends ModelBase {

	public static function tableName()
    {
        return '{{images}}';
    }

    public function get($id_img)
    {
        return self::find()->where(['id' => $id_img, 'status' => self::STATUS_ACTIVE])->limit(1)->one();
    }
   
}
