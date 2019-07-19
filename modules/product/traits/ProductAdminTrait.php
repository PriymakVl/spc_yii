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
		$filters = $this->category->getFilters();
		if (!$filters) return '<span style="color:red;">Не определены</span>';
	}

	public function getCategoriesForSelect()
	{
		if (!$this->category) return [];
		if (!$this->category->parent) $this->category->getParent();
		if (!$this->category->parent) return Category::find()->select(['name', 'id'])->indexBy('id')->column();
		return Category::find()->select(['name', 'id'])->where(['id_parent' => $this->category->id_parent])->indexBy('id')->column();
	}
}