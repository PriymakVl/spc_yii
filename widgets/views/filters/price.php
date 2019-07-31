<?php
	$min = empty($_GET['min_price']) ? '' : $_GET['min_price'];
	$max = empty($_GET['max_price']) ? '' : $_GET['max_price'];
?>
<section class="filter-price">
	<h3>
		<span>Цена</span>
		<i class="fas fa-angle-up"></i>
	</h3>
	<div class="filter-content-wrp">
		<input class="min-price" type="text" name="min_price" value="<?=$min?>">
		<input class="max-price" type="text" name="max_price" value="<?=$max?>">
	</div>
</section>