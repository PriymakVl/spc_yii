<?php
	use yii\helpers\Url;
?>

<div class="subcategory-block">
	<? if ($cat->children): ?>
		<? foreach ($cat->children as $subcat): ?>
			<div class="subcategory-item">
				<a href="<?=Url::to(['/category', 'id_cat' => $subcat->id])?>">
					<img src="products/4.jpeg" >
					<span class="subcategory-info">
						<span class="subcategory-name"><?=$subcat->name?></span>
						<span class="subcategory-desc"><?=$subcat->description?></span>
					</span>
				</a>
			</div>
		<? endforeach; ?>
	<? endif; ?>
</div> 

