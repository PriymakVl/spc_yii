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
		$form = (object)$this->request->post('OrderCylinderForm');
		debug($form);
		$data = ['id_cat' => $form->id_cat, 'diameter' => $form->diameter, 'length' => $form->length, 'qty' => $form->qty];
		$_SESSION['cart']['cylinders'][] = 
		Yii::$app->session->setFlash('success', 'Пневмоцилиндр добавлен в корзину');
		return $this->redirect($this->request->referrer);
	}

	public function actionSale()
	{
		$this->view->title = 'Акции';
		return $this->render('sale/main');
	}

	public function saveOrder()
	{
		$model = new OrderCylinderForm();
		if ($model->load($this->request->post()) && $model->saveCylinder((object)$this->request->post('OrderCylinderForm'))) {
			Yii::$app->session->setFlash('success', 'Цилиндр добавлен в корзину');
		}
		else Yii::$app->session->setFlash('error', 'Ошибка при добавлении цилиндра в корзину');
		return $this->redirect($this->request->referrer);
	}

	private function setDataSession()
	{

	}

}