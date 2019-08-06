<?php

namespace app\models;

use app\models\ModelBase;
use yii\web\NotFoundHttpException;

class Image extends ModelBase {

	public static function tableName()
    {
        return '{{images}}';
    }

    public function get($id_img)
    {
        return self::find()->where(['id' => $id_img, 'status' => self::STATUS_ACTIVE])->limit(1)->one();
    }

    public function saveImage($subdir, $file)
    {
    	$this->subdir = 'iblock/'.$subdir;
    	$this->filename = $file->name;
    	if ($this->save()) return $this;
    	throw new NotFoundHttpException('Ошибка при загрузке файла.');
    }
   
}
