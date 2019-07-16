<?php

	namespace app\modules\product\filters;

trait ProductFilter {

	public function filter($id_cat)
	{
		$products = self::find()->where(['id_cat' => $id_cat, status => self::STATUS_ACTIVE])->all();
		if ($_GET['min-price'] || $_GET['max-price'] ) $products = $this->filterPrice($products);
		return $this->callMethods($products, ['getImage']);
	}

	private function filterPrice($products)
	{
		$result = [];
		$min = $max = false;
		foreach ($products as $product) {
			$product->getPrice();
			if (!$_GET['min-price']) $min = true;
			else if ($_GET['min-price'] && $product->price->value > $_GET['min-price']) $min = true;

			if (!$_GET['max-price']) $max = true;
			else if ($_GET['max-price'] && $product->price->value < $_GET['max-price']) $max = true;

			if ($min && $max) $result[] = $product;
			$min = $max = false;
		}
		return $result;
	}



}