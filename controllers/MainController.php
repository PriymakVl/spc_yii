<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	// use app\modules\product\classes\Product;
	
class MainController extends BaseController {

	public function actionIndex()
	{
		$this->view->title = 'Пневмооборудование';
		return $this->render('index');
	}

	public function actionContacts()
	{
		$this->view->title = 'Контакты';
		return $this->render('contacts/main');
	}

	public function actionSale()
	{
		$this->view->title = 'Акции';
		return $this->render('sale/main');
	}

	public function actionCart()
	{
		$cart = $this->session->get('cart');
		$this->view->title = 'Корзина';
		return $this->render('cart/main', compact('cart'));
	}

	public function actionDeleteItemCart($type, $index)
	{
		unset($_SESSION['cart'][$type][$index]);
		if (empty($_SESSION['cart'][$type])) unset($_SESSION['cart'][$type]);
		Yii::$app->session->setFlash('success', 'Продукт удален из корзины');
		return $this->redirect('cart');
	}

	// public function saveOrder()
	// {
	// 	$model = 
	// 	$id_order = (new Order)->saveOrder();
	// }

}