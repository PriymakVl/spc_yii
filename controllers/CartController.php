<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\models\OrderCylinderForm;
	
class CartController extends BaseController {

	public function actionIndex()
	{
		// $this->view->title = 'Корзина';
		// return $this->render('index');
		$cart = $this->session->get('cart');
		$this->view->title = 'Корзина';
		return $this->render('index', compact('cart'));
	}

	public function actionAddCylinderToCart()
	{
		$this->setSessionCylinder();
		Yii::$app->session->setFlash('success', 'Пневмоцилиндр добавлен в корзину');
		return $this->redirect($this->request->referrer);
	}

	public function actionDeleteItemCart($type, $index)
	{
		unset($_SESSION['cart'][$type][$index]);
		if (empty($_SESSION['cart'][$type])) unset($_SESSION['cart'][$type]);
		Yii::$app->session->setFlash('success', 'Продукт удален из корзины');
		return $this->redirect('cart');
	}

	// public function actionCart()
	// {
	// 	$cart = $this->session->get('cart');
	// 	$this->view->title = 'Корзина';
	// 	return $this->render('cart/main', compact('cart'));
	// }

	private function setSessionCylinder()
	{
		$form = (object)$this->request->post('OrderCylinderForm');
		$data['id_cat'] = $form->id_cat;
		$data['stroke'] = $form->stroke;
		$data['diameter'] = $form->diameter;
		$data['qty'] = $form->qty;
		$data['magneto'] = $form->magneto;
		$data['thread_rod'] = $form->thread_rod;  
		$_SESSION['cart']['cylinders'][] = $data;
	}

}