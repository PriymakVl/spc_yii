<?php
	use app\modules\category\classes\Category;

    $cat = (new Category)->get($product->id_cat)->getParent();
?>

<!-- css -->
<link rel="stylesheet" type="text/css" href="/web/css/product/index/main.css">

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
			<li><a href="#"><?=$product->name?></a></li>
		</ul>
	</div>

	<!-- name product-->
	<h1 class="product-code"><?=$product->name?></h1>

	<!-- product -->
	<? include 'product.php'; ?>

	<!-- similar products -->
	<div class="similar-products-block"></div>

	<!-- viewed products -->
	<div class="viewed-block"></div>
</main>