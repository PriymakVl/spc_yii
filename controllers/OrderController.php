<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\models\OrderCylinderForm;
	
class OrderController extends BaseController {

	public function actionIndex()
	{
		$this->view->title = 'Корзина';
		return $this->render('index');
	}

	public function actionAddCylinderToCart()
	{
		$this->setSessionCylinder();
		Yii::$app->session->setFlash('success', 'Пневмоцилиндр добавлен в корзину');
		return $this->redirect($this->request->referrer);
	}

	public function actionSale()
	{
		$this->view->title = 'Акции';
		return $this->render('sale/main');
	}

	// public function actionSaveOrder()
	// {
	// 	$model = new OrderForm();
	// 	if ($model->load($this->request->post()) ) {
	// 		$model->saveOrder((object)$this->request->post('OrderCylinderForm'))
	// 		Yii::$app->session->setFlash('success', 'Заказ оформлен');
	// 	}
	// 	else Yii::$app->session->setFlash('error', 'Ошибка при оформлении заказа');
	// 	return $this->redirect($this->request->referrer);
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