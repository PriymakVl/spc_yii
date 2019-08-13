<main>
	<!-- breadcrumbs -->
	<div class="breadcrumbs-wrp">
		<ul class="breadcrumbs">
			<li><a href="#"></a>Главная</li>
			<li>Корзина</li>
		</ul>
	</div>

	<h1 id="pagetitle">Корзина</h1>

	<div class="cart-wrp">
		<? if (!empty($cart)): ?>
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th width="120">Фото</th>
				<th width="200">Кодировка</th>
				<th>Описание</th>
				<th>Цена</th>
				<th width="50">Кол-во</th>
				<th>Управление</th>
			</tr>

			<!-- cylinders -->
			<? if (isset($cart['cylinders'])): ?>
				<? include 'cylinders.php'; ?>
			<? endif ?>

		</table>
		<? else: ?>
			<p>В корзине еще нет товаров</p>
		<? endif; ?>
	</div>

</main>