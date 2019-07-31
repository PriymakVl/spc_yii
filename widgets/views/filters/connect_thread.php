<?

	$filter = (new app\modules\filter\classes\Filter)->selectByName('connect_thread');
?>

<section>
	<h3>
		<span><?=$filter->title?></span>
		<i class="fas fa-angle-up"></i>
	</h3>
	<div class="filter-content-wrp">
		<? if ($filter->items): ?>
			<? foreach ($filter->items as $item): ?>
				<div class="filter-item-wrp">
					<input type="checkbox" name="connect_thread[]" value="<?=$item->id?>" <? if (isset($_GET['connect_thread']) && in_array($item->id, $_GET['connect_thread'])) echo 'checked'?>>
					<label><?=$item->name?></label>
				</div>
			<? endforeach; ?>
		<? endif; ?>
	</div>
</section>