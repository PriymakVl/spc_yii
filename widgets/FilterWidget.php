<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\modules\category\classes\Category;
use app\modules\filter\Filter;
use yii\helpers\ArrayHelper;

class FilterWidget extends Widget {


	public function run()
	{
		$id_cat = Yii::$app->request->get('id_cat');
		$cat = (new Category)->get($id_cat);
		$filters = $this->createFiltersNamesArray($cat->filters);
		return $this->render('filters/main', compact('filters'));
	}

	private function createFiltersNamesArray($filters)
	{
		if (!$filters) return;
		$names = [];
		foreach ($filters as $filter) {
			$names[] = $filter->name;
		}
		return $names;
	}



}