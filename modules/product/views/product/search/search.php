<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
?>

<!-- products -->
<div class="product-block">
	<? foreach ($products as $product): ?>
		<a class="product-item" href="<?=Url::to(['/product', 'id_prod' => $product->id])?>">
			<? if ($product->image): ?>
				<?= Html::img(['@iblock/'.$product->image->subdir.'/'.$product->image->filename, ['alt' => $product->name]]) ?>
			<? else: ?>
				<?= Html::img(['@img/no_photo_medium.png']) ?>
			<? endif; ?>
			<span class="product-code"><?=$product->name?></span>
			<span class="product-state"><i class="fa fa-check"></i>Достаточно</span>
			<span class="product-price">
				<span class="price-value"><?//=$product->price?>100</span>
				<span class="price-currency">грн.</span>
				<span class="price-measure">/шт</span>
			</span>
		</a>
	<? endforeach; ?>
</div> 