<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\modules\category\classes\Category;
use yii\helpers\ArrayHelper;
use app\models\OrderCylinderForm;

class OrderFormCylinderWidget extends Widget {

	public $category;

	public function run()
	{
		$series = $this->createSeriesArray();
		$diameters = [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
		$model = new OrderCylinderForm();
		$model->id_cat = $this->category->id;
		return $this->render('order_form_cylinder', compact('series', 'model', 'diameters'));
	}

	private function createSeriesArray()
	{
		$categories = Category::find()->where(['id_parent' => Category::PNEUMO_CYLINDER_CAT_ID, 'status' => Category::STATUS_ACTIVE])->asArray()->all();
		return ArrayHelper::map($categories, 'id', 'name');
	}



}