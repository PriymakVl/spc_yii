<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\OrderCylinder;
use yii\web\NotFoundHttpException;

class OrderCylinderForm extends Model
{
    public $id_cat;
    public $diameter;
    public $length;
    public $qty;

    public function rules()
    {
        return [
            [['id_cat', 'diameter', 'length', 'qty'], 'integer'],
            [['id_cat', 'diameter', 'length', 'qty'], 'required'],
        ];
    }

    public function saveCylinder($form)
    {
        if (!$this->validate()) throw new NotFoundHttpException('Ошибка валидации');
        $cylinder = new OrderCylinder;
        $cylinder->qty = $form->qty;
        $cylinder->diameter = $form->diameter;
        $cylinder->length = $form->length;
        $cylinder->id_cat = $form->id_cat;
        return $cylinder->save();
    }




}