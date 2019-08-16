<?php

	namespace app\modules\order\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\models\Customer;
	use app\models\Order;
	use app\models\OrderProduct;
	
class OrderController extends BaseController {


	public function actionSave()
	{
		$form = (object) $_GET;
		$customer = (new Customer)->getAccordingToForm($form);
		$order = (new Order)->saveOrder($customer->id, $form->note);
		(new OrderProduct)->saveCart($order->id, $this->session->get('cart'));
		$this->session->setFlash('success', 'Заказ оформлен');
		$this->session->remove('cart');
		return $this->redirect('/main/index');
	}


}