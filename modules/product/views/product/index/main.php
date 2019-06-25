<!-- css -->
<link rel="stylesheet" type="text/css" href="/web/css/product/index/main.css">

<main>
	<!-- breadcrumbs -->
	<div class="breadcrumbs-wrp">
		<ul class="breadcrumbs">
			<li><a href="#"></a>Главная</li>
			<li><a href="#"></a>Каталог</li>
			<li><a href="#"></a>Блоки подготовки воздуха</li>
		</ul>
	</div>

	<!-- code product-->
	<h1 class="product-code"><?=$product->code?></h1>

	<!-- product -->
	<? include 'product.php'; ?>

	<!-- similar products -->
	<div class="similar-products-block"></div>

	<!-- viewed products -->
	<div class="viewed-block"></div>
</main>