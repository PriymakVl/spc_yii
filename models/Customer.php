<?php

namespace app\models;

use app\models\ModelBase;

class Customer extends ModelBase {

	public static function tableName()
    {
        return '{{customers}}';
    }

    public function getAccordingToForm($form)
    {
        $customer = self::findOne(['name' => $form->name, 'email' => $form->email, 'phone' => $form->phone]);
        if ($customer) return $customer;
        return $this->registerCustomer($form);
     }  

    private function registerCustomer($form)
    {
        $customer = new self;
        $customer->name = $form->name;
        $customer->email = $form->email;
        $customer->phone = $form->phone;
        if ($customer->save()) return $customer;
    }

   
}
