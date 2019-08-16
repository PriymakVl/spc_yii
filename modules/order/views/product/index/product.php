<?
	use yii\helpers\Html;
?>

<div class="product-wrp">
	<?= Html::img('@img/'.$product->image->subdir.'/'.$product->image->filename, ['alt' => $product->name]) ?>
	<!-- product info -->
	<div class="product-info">
		<span class="product-name"><?=$product->name?></span>
		<br>
		<span class="product-preview"><?=$product->preview?></span>
		<br>
		<!-- product price -->
		<span class="product-price">
			<span class="price-value"><?=$product->price->value?></span>
			<span class="price-currency">грн.</span>
			<span class="price-measure">/шт</span>
		</span>
		<!-- product descrition -->
		<p class="product-description">
			<?= $product->description ?>
		</p>
	</div>
</div>