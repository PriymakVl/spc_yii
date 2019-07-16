<div class="filters-wrp">
	<form action="filter">
		<!-- filter price -->
		<section class="filter-price">
			<h3>
				<span>Цена</span>
				<i class="fas fa-angle-up"></i>
			</h3>
			<div class="filter-content-wrp">
				<input class="min-price" type="text" name="min-price">
				<input class="max-price" type="text" name="max-price">
			</div>
		</section>
		<!-- filter thread connecting -->
		<section>
			<h3>
				<span>Присоединительная резьба</span>
				<i class="fas fa-angle-up"></i>
			</h3>
			<div class="filter-content-wrp">
				<div class="filter-item-wrp">
					<input type="checkbox" name="thread-connect">
					<label>G1</label>
				</div>
				<div class="filter-item-wrp">
					<input type="checkbox" name="thread-connect">
					<label>G1/2</label>
				</div>
				<div class="filter-item-wrp">
					<input type="checkbox" name="thread-connect">
					<label>G1/4</label>
				</div>
			</div>
		</section>
		<!-- hidden -->
		<input type="hidden" name="id_cat" value="<?=$_GET['id_cat']?>">
		<!-- form button block -->
		<div class="form-button-wrp">
			<input type="submit" value="Показать">
			<a href="#"><i class="fas fa-times"></i>Сбросить</a>
		</div>
	</form>
</div>
