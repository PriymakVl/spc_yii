<!-- css -->
<link rel="stylesheet" type="text/css" href="/web/css/category/index/main.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/categories.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/products.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/cat_description.css">

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

	<? if ($products): ?> 
		<? include 'products.php'; ?>
	<? elseif($category->children): ?>
	 	<? include 'categories.php'; ?>
 	<? else: ?>
 		<p>В этой категории ничего нет</p>
	<? endif; ?>

	<!-- category description -->
	<div class="description-wrp">
		<?php if ($cat->description) echo $cat->description; ?>
	</div>

	<!-- similar products -->
	<!-- <div class="similar-products-block"></div> -->

	<!-- viewed products -->
	<!-- <div class="viewed-block"></div> -->
</main>