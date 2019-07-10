<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
?>

<div class="subcategory-block">
	<? if ($cat->children): ?>
		<? foreach ($cat->children as $subcat): ?>
			<div class="subcategory-item">
				<a href="<?=Url::to(['/category', 'id_cat' => $subcat->id])?>">
					<? if ($subcat->image): ?>
							<?= Html::img(['@iblock/'.$subcat->image->subdir.'/'.$subcat->image->filename, ['alt' => $subcat->name]]) ?>
						<? else: ?>
							<?= Html::img(['@img/no_photo_medium.png']) ?>
					<? endif; ?>
					<span class="subcategory-info">
						<span class="subcategory-name"><?=$subcat->name?></span>
						<span class="subcategory-desc"><?=$subcat->description?></span>
					</span>
				</a>
			</div>
		<? endforeach; ?>
	<? endif; ?>
</div> 

