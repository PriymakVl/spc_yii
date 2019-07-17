<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\modules\category\classes\Category;
use app\models\Filter;

class FilterWidget extends Widget {


	public function run()
	{
		$id_cat = Yii::$app->request->get('id_cat');
		$filters = (new Category)->get($id_cat)->getFilters();
		return $this->render('filters/main', compact('filters'));
	}

	// private function createFiltersHtml($filters_cat)
	// {
	// 	$filters_names = Filter::getAllNames();
	// 	$filters_html = '';
	// 	foreach ($filters_names as $name) {
	// 		if (in_array($name, $filters_cat)) $filters_html .= file('')
	// 	}
		
	// }



}