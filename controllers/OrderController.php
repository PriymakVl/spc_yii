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

	public function actionAddCylinder()
	{
		$model = new OrderCylinderForm();
		if ($model->load($this->request->post()) && $model->validate()) {
			$model->saveCylinder((object)$this->request->post('OrderCylinderForm'))->setMessage('success', 'Цилиндр добавлен в корзину');
		}
		else $model->setMessage('error', 'Ошибка при добавлении цилиндра в корзину');
		return $this->redirect($this->request->referrer);
	}

	public function actionSale()
	{
		$this->view->title = 'Акции';
		return $this->render('sale/main');
	}

}