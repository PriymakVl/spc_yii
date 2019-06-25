<?php
use app\assets\BaseAsset;
use yii\helpers\Html;
BaseAsset::register($this);
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

	<!-- search -->
	<div class="search-wrp">
		<form action="">
			<input type="text" placeholder="Поиск по товарам" maxlength="100" autocomplete="off">
			<input type="submit" class="search-icon">
		</form>
	</div>
</header>