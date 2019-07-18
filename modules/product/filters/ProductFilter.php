<?php

namespace app\modules\product\filters;

use app\models\Filter;
use app\models\FilterItem;

trait ProductFilter {

	public function filter($id_cat)
	{
		$products = self::find()->where(['id_cat' => $id_cat, status => self::STATUS_ACTIVE])->all();
		if (!$products) return;
		$this->callMethods($products, ['getItemsOfFilters']);
		$products = $this->applyFilters($products);
		if ($products) return $this->callMethods($products, ['getImage', 'getPrice']);
	}

	private function applyFilters($products)
	{
			$products = $this->filterPrice($products);
			if (!$products) return;
			$products = empty($_GET['connect_thread']) ? $products : $this->selectProducts($products, 'connect_thread');
			return $products;
	}

	private function filterPrice($products)
	{
		if (!$_GET['min_price'] && !$_GET['max_price'] ) return $products;
		$result = [];
		$min = $max = false;
		foreach ($products as $product) {
			$product->getPrice();
			if (!$_GET['min_price']) $min = true;
			else if ($_GET['min_price'] && $product->price->value > $_GET['min_price']) $min = true;

			if (!$_GET['max_price']) $max = true;
			else if ($_GET['max_price'] && $product->price->value < $_GET['max_price']) $max = true;

			if ($min && $max) $result[] = $product;
			$min = $max = false;
		}
		return $result;
	}

	private function selectProducts($products, $filter_name)
	{
		$result = [];
		foreach ($products as $product) {
			if (empty($product->itemsFilters[$filter_name])) continue;
			if (in_array($product->itemsFilters[$filter_name], $_GET[$filter_name])) $result[] = $product;
		}
		return $result;
	}



}