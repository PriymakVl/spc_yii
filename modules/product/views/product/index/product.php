<?
	use yii\helpers\Html;
?>

<div class="product-wrp">
	<?= Html::img('@web/products/6.jpeg', ['alt' => $product->code]) ?>
	<!-- product info -->
	<div class="product-info">
		<span class="product-code"><?=$product->code?></span>
		<span class="product-name"><?=$product->name?></span>
		<!-- product price -->
		<span class="product-price">
			<span class="price-value"><?=$product->price?></span>
			<span class="price-currency">грн.</span>
			<span class="price-measure">/шт</span>
		</span>
	</div>
</div>