<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
?>
<!-- sort product -->
<!-- <div class="sort-product-wrp">
	<div class="link-block">
		<a href="#">По популярности<i class="fas fa-angle-down"></i></a>
		<a href="#">По алфавиту<i class="fas fa-angle-down"></i></a>
		<a href="#">По цене<i class="fas fa-angle-down"></i></a>
	</div>
</div> -->

<!-- products -->
<div class="product-block">
	<? if ($cat->products): ?>
		<? foreach ($cat->products as $product): ?>
			<a class="product-item" href="<?=Url::to(['/product', 'id_prod' => $product->id])?>">
				<? if ($product->image): ?>
					<?= Html::img(['@img/'.$product->image->subdir.'/'.$product->image->filename, ['alt' => $product->name]]) ?>
				<? else: ?>
					<?= Html::img(['@img/no_photo_medium.png']) ?>
				<? endif; ?>
				<span class="product-code"><?=$product->name?></span>
				<span class="product-state"><i class="fa fa-check"></i>Достаточно</span>
				<span class="product-price">
					<span class="price-value"><?=$product->price->value?></span>
					<span class="price-currency">грн.</span>
					<span class="price-measure">/шт</span>
				</span>
			</a>
		<? endforeach; ?>
	<? endif; ?>
</div> 

