<?

	$filter = (new app\models\Filter)->selectByName('connect_thread')->getItems();
?>

<section>
	<h3>
		<span>Присоединительная резьба</span>
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