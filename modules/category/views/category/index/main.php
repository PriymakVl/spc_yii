<!-- css -->
<link rel="stylesheet" type="text/css" href="/web/css/category/index/main.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/categories.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/products.css">

<main>
	<!-- breadcrumbs -->
	<div class="breadcrumbs-wrp">
		<ul class="breadcrumbs">
			<li><a href="#"></a>Главная</li>
			<li><a href="#"></a>Каталог</li>
			<li><a href="#"></a>Блоки подготовки воздуха</li>
		</ul>
	</div>

	<!-- name category -->
	<h1 class="category-name"><?=$cat->name?></h1>

	<!-- sub categories -->
	<? if ($cat->products) include 'products.php'; ?>
	<? include 'categories.php'; ?>

	<!-- similar products -->
	<div class="similar-products-block"></div>

	<!-- viewed products -->
	<div class="viewed-block"></div>
</main>