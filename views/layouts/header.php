<?php
use app\assets\BaseAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

BaseAsset::register($this);

function calculate_items_cart()
{
	if (empty($_SESSION['cart'])) return 0;
	$qty_cylinders = empty($_SESSION['cart']['cylinders']) ? 0 : count($_SESSION['cart']['cylinders']);
	$qty_products = empty($_SESSION['cart']['products']) ? 0 : count($_SESSION['cart']['products']);
	return $qty_cylinders + $qty_products;
}

$qty_items_cart = calculate_items_cart();
?>

<header>
	<!-- top row -->
	<div class="top-row">
		<!-- topest menu -->
		<nav class="topest-menu">
			<ul>
				<li  >
					<a href="/company/"><span>О компании</span></a>
				</li>
				<li  >
					<a href="/company/news/"><span>Новости</span></a>
				</li>
				<li  >
					<a href="/info/articles/"><span>Статьи</span></a>
				</li>
				<li  >
					<a href="/info/faq/"><span>Вопрос-ответ</span></a>
				</li>
				<li  >
					<a href="/company/jobs/"><span>Вакансии</span></a>
				</li>
			</ul>
		</nav>

		<!-- phones -->
		<div class="phones">
			<div class="phone-item">
				<span class="phone-wrp">
					<i class="fa fa-phone"></i>
					<span class="phone-number">0800210317</span>
				</span>
				<span class="callback-btn">Заказать звонок</span>
			</div>
		</div> 
		
		<!-- user block -->
		<div class="user-block">
			<i class="fas fa-user"></i>
			<a class="avtorization" rel="nofollow" href="/auth/">Вход</a>
			<a class="register" rel="nofollow" href="/auth/registration/">Регистрация</a>
		</div>
	</div>

	<!-- logo -->
	<div class="logo-wrp">
		<a href="/">
			<?= Html::img('@img/logo.jpg', ['alt' => 'Specialist']) ?>
		</a>
	</div>

	<!-- cart -->
	<a href="/cart" class="cart-wrp" style=" position: absolute; top: 60px; left: 240px;">
		<!-- <i class="fas fa-shopping-cart" style="font-size: 24px;"></i> -->
		<br>
		<span>В вашей корзине товаров: <?= $qty_items_cart?></span>
	</a>

	<!-- search -->
	<div class="search-wrp">
		<form action="/search">
			<input type="text" name="name" placeholder="Поиск продукции" maxlength="100" autocomplete="off" required>
			<input type="submit" class="search-icon">
		</form>
	</div>
</header>