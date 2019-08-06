<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{

    public $imageFile;
    public $subdir;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $dir = Yii::getAlias('@app/web/images/iblock/');
            $filename = md5(microtime() . rand(0, 9999));
            $this->subdir = substr($filename, 0, 3);
            $dir .= $this->subdir.'/';
            if (!is_dir($dir)) mkdir($dir);
            $this->imageFile->name = $filename.'.'.$this->imageFile->extension;
            return $this->imageFile->saveAs($dir. $this->imageFile->name);
        }
        return false;
    }

    public function saveImage()
    {
         if (!$this->upload()) throw new NotFoundHttpException('Ошибка при загрузке файла.');
        $image = (new Image)->saveImage($this->subdir, $this->imageFile);
        return $image->id;
    }

    public function uploadImageProduct($product) {
        $product->id_img = $this->saveImage();
        return $product->save();
    }

     public function uploadImageCategory($category) {
        $category->id_img = $this->saveImage();
        return $category->save();
    }



}