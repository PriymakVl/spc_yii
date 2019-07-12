<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
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
	<? if ($products): ?>
		<? foreach ($products as $product): ?>
			<a class="product-item" href="<?=Url::to(['/product', 'id_prod' => $product->id])?>">
				<? if ($product->image): ?>
					<?= Html::img(['@img/'.$product->image->subdir.'/'.$product->image->filename, ['alt' => $product->name]]) ?>
				<? else: ?>
					<?= Html::img(['@img/no_photo_medium.png']) ?>
				<? endif; ?>
				<span class="product-code"><?=$product->name?></span>
				<span class="product-state"><i class="fa fa-check"></i>Достаточно</span>
				<? if ($product->price->value): ?>
					<span class="product-price">
						<span class="price-value"><?=$product->price->value?></span>
						<span class="price-currency">грн.</span>
						<span class="price-measure">/шт</span>
					</span>
				<? endif; ?>
			</a>
		<? endforeach; ?>
	<? endif; ?>
</div>

<!-- pagination -->
<?php echo LinkPager::widget(['pagination' => $pages,]); ?>

