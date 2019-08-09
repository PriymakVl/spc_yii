<? if ($filters): ?>
	<div class="filters-wrp">
		<form action="/filter">
			<!-- filter price -->
			<? if (in_array('price', $filters)) include 'price.php'; ?>
			
			<? 
				foreach ($filters as $name) {
					if ($name == 'price') continue; 
					$filter = (new app\modules\filter\classes\Filter)->selectByName($name);
					if ($filter) include 'default.php';
				}
			?>
			

			<!-- hidden -->
			<input type="hidden" name="id_cat" value="<?=$_GET['id_cat']?>">
			<!-- form button block -->
			<div class="form-button-wrp">
				<input type="submit" value="Показать">
				<a href="/category?id_cat=<?=$_GET['id_cat']?>"><i class="fas fa-times"></i>Сбросить</a>
			</div>
		</form>
	</div>
<? endif; ?>