<?php

namespace app\models;

use Yii;
use app\models\ModelBase;
use yii\web\NotFoundHttpException;

class Order extends ModelBase
{

    const STATE_ALL = 'all';
    const STATE_REGISTERED = 1;
    const STATE_CLOSED = 2;

    public static function tableName()
    {
        return '{{orders}}';
    }

    public function saveOrder($id_customer, $note)
    {
        $order = new self;
        $order->id_customer = $id_customer;
        $order->registered = time();
        $order->note = $note;
        $order->state = self::STATE_REGISTERED;
        if ($order->save()) return $order;
    }


}