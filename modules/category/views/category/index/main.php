<!-- css -->
<link rel="stylesheet" type="text/css" href="/web/css/category/index/main.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/categories.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/products.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/cat_description.css">

<main>
	<!-- breadcrumbs -->
	<div class="breadcrumbs-wrp">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><a href="category/list">Каталог</a></li>
			<? if ($cat->parent): ?>
				<li><a href="/category?id_cat=<?=$cat->parent->id?>"><?=$cat->parent->name?></a></li>
			<? endif; ?>	
			<li><a href="/category?id_cat=<?=$cat->id?>"><?=$cat->name?></a></li>
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