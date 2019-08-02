<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{

    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $dir = Yii::getAlias('@app/web/temp/');
            return $this->imageFile->saveAs($dir. $this->imageFile->name);
        }
        return false;
    }

    public function uploadImageProduct($product) {
        if (!$this->upload()) throw new NotFoundHttpException('Ошибка при загрузке файла.');
        $image = Image::saveImg($product->image);
        debug($image);
        $product->id_img = $image->id;
        return $product->save();
    }



}