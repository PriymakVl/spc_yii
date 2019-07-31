<? if ($filter->items): ?>
	<!-- filter <?=$filter->name?> -->
	<section>
		<h3>
			<span><?=$filter->title?></span>
			<i class="fas fa-angle-up"></i>
		</h3>
		<div class="filter-content-wrp">

				<? foreach ($filter->items as $item): ?>
					<div class="filter-item-wrp">
						<input type="checkbox" name="<?=$filter->name.'[]'?>" value="<?=$item->id?>" <? if (isset($_GET[$filter->name]) && in_array($item->id, $_GET[$filter->name])) echo 'checked'?>>
						<label><?=$item->name?></label>
					</div>
				<? endforeach; ?>
		</div>
	</section>
<? endif; ?>