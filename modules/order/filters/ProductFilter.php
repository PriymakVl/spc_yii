<?php

namespace app\modules\product\filters;

use app\modules\filter\Filter;
use app\models\FilterItem;
use app\helpers\Helper;

trait ProductFilter {

	public function filter($cat)
	{
		if ($cat->children) $products = self::find()->where(['id_cat' => Helper::getProperties($cat->children, 'id'), 'status' => self::STATUS_ACTIVE])->all();
		else $products = self::find()->where(['id_cat' => $id_cat, status => self::STATUS_ACTIVE])->all();
		if (!$products) return;
		$this->callMethods($products, ['getItemsFilters']);
		return $this->applyFilters($products);
	}

	private function applyFilters($products)
	{
			$products = $this->filterPrice($products);
			if (!$products) return;
			foreach ($_GET as $name => $value) {
				if ($name == 'min_price' || $name == 'max_price' || $name == 'id_cat') continue;
				if (!$products) break;
				$products = $this->selectProducts($products, $name);
			}
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
		// debug($_GET, false);
		foreach ($products as $product) {
			// if ($product->itemsFilters) debug($product->itemsFilters, false);
			if (empty($product->itemsFilters[$filter_name])) continue;
			if (in_array($product->itemsFilters[$filter_name], $_GET[$filter_name])) $result[] = $product;
		}
		// debug(count($result));
		// exit('end');
		return $result;
	}



}