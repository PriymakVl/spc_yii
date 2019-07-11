<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<nav class="catalog-menu">
	<ul>
		<li>
			<a href="/catalog/" >Каталог</a>
			<i class="fas fa-angle-down"></i>
			<? if ($catalog): ?>
				<ul>
					<? foreach ($catalog as $cat): ?>
						<li>
							<a href="<?=Url::to(['/category', 'id_cat' => $cat->id])?>"><?=$cat->name?></a>
							<i class="fas fa-angle-right"></i>
							<? if ($cat->children): ?>
								<!-- catalog img menu -->
								<ul class="img-list-menu">
									<? foreach ($cat->children as $subcat): ?>
										<li>
											<a href="<?=Url::to(['/category', 'id_cat' => $subcat->id])?>">
												<?= Html::img('@img/'.$subcat->image->subdir.'/'.$subcat->image->filename, ['alt' => $subcat->name, 'width' => '50', 'height'=> '50']) ?>
												<span><?=$subcat->name?></span>
											</a>
										</li>
									<? endforeach; ?>
								</ul>
							<? endif; ?>
						</li>
					<? endforeach; ?>
				</ul>
			<? endif; ?>
		</li>
	</ul>
</nav>