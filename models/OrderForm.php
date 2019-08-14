<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\NotFoundHttpException;

class OrderCylinderForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'comment'], 'string'],
        ];
    }

    public function saveOrder($form)
    {
        if (!$this->validate()) throw new NotFoundHttpException('Ошибка валидации');
        $order = new Orders();
        $order->id_customer = $this->getIdCustomer();
        $order->created = time();
        $order->note = $form->note;
        if ($order->save()) return $order->id;
    }

    private function getIdCustomer($form)
    {
        $customer = Customer::findOne(['email' => $form->email]);
        if ($customer) return $customer->id;
        $customer = new Customer();
        $customer->email = $form->email;
        $customer->name = $form->name;
        $customer->phone = $form->phone;
        If ($customer->save()) return $customer->id;
    }




}