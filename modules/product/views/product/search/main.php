<!-- css -->
<link rel="stylesheet" type="text/css" href="/web/css/product/search/main.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/products.css">

<main>
	<!-- breadcrumbs -->
	<div class="breadcrumbs-wrp">
		<ul class="breadcrumbs">
			<li><a href="#"></a>Главная</li>
			<li><a href="#"></a>Поиск</li>
		</ul>
	</div>

	<h1 id="pagetitle">Результаты поиска</h1>

	<?  if ($products): ?>
		<? include 'search.php'; ?>
	<? else: ?>
		<p style="color: red;">Сожалеем, но ничего не найдено.</p>
	<? endif; ?>
</main>