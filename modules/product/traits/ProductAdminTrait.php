<?php

namespace app\modules\product\traits;

use app\modules\category\classes\Category;

trait ProductAdminTrait {

	public function createBreadcrumbsCategories()
	{
		if (!$this->category) return 'Не определена';
		$link_cat = '<a href="category-admin/view?id='.$this->category->id.'">'.$this->category->name.'</a>';
		$this->category->getParent();
		if (!$this->category->parent) return $link_cat;
		$link_parent = '<a href="category-admin/view?id='.$this->category->parent->id.'">'.$this->category->parent->name.'</a>';
		return $link_parent.' / '.$link_cat;
	}

	public function createListFilters()
	{
		$filters = $this->category->filters;
		if (!$filters) return '<span style="color:red;">Не определены</span>';
		$filters_list = '<ol>';
		foreach ($filters as $filter) {
			$item_filter = $this->getItemFilter($filter->id);
			$item_filter = $item_filter ? '<i class="text-info">( '.$item_filter->name.' )</i>' : '<i class="text-danger">( не указано )</i>';
			if ($filter->name == 'price') $item_filter = '<i class="text-info">( '.$this->price->value.' )</i>';
			$filters_list .= sprintf('<li>%s&nbsp;&nbsp;&nbsp;%s</li>', $filter->title, $item_filter);
		}
		return $filters_list.'</ol>';
	}

	public function getCategoriesForSelect()
	{
		//return (new Category)->convertForSelectMainWithSubcategory();
		// if (!$this->category) return Category::find()->select(['name', 'id'])->where([])->indexBy('id')->column();
		// if (!$this->category->parent) $this->category->getParent();
		// if (!$this->category->parent) return Category::find()->select(['name', 'id'])->indexBy('id')->column();
		// return Category::find()->select(['name', 'id'])->where(['id_parent' => $this->category->id_parent])->indexBy('id')->column();
	}
}