<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\modules\category\classes\Category;

class CatalogMenuWidget extends Widget {


	public function run()
	{
		$id_cat = Yii::$app->request->get('id_cat');
		$catalog = (new Category)->getMain();
		return $this->render('catalogmenu', compact('catalog', 'id_cat'));
	}

}