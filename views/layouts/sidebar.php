<?php

use yii\helpers\Html;
use app\widgets\FilterWidget;

?>

<aside>
	<!-- filters products -->
	<?if (Yii::$app->controller->id == 'category') echo FilterWidget::widget(); ?>

	<!-- banner -->
	<div class="banner">
		<a href="#">
			<?= Html::img('@banner/banner.jpg', ['alt' => 'banner']) ?>
		</a>
	</div>
	<!-- sibscrib form -->
	<div class="sibscribe-wrp">
		<h2>Будь всегда в курсе!</h2>
		<p>Узнавайте о скидках и  акциях первым</p>
		<form action="">
			<input type="email" name="email" maxlength="100" placeholder="Ваш email">
			<input type="submit" value="Подписаться" name="OK">
		</form>
	</div>
	<!-- news -->
	<div class="news-wrp">
		<div class="news-header">
			<span>Новости</span>
			<a href="#">Все новости</a>
		</div>
		<div class="news-items">
			<section>
				<time>12 декабря 2016</time>
				<p>Запуск нового сайта компании Специалист</p>
			</section>
		</div>
	</div>
	<!-- articles preview -->
	<div class="articles-wrp">
		<div class="articles-header">
			<span>Статьи</span>
			<a href="#">Все статьи</a>
		</div>
		<div class="articles-items">
			<article>
				<?= Html::img('web/images/3eb5b9d93354b4f63a4c9c6c27d5987c.jpg', ['alt' => 'Использование панелей оператора HMI', 'width' => '60', 'height'=> '60']) ?>
				<span>Использование панелей оператора HMI</span>
			</article>
			<article>
				<?= Html::img('web/images/aec84e4b0620eeaf6ec8b9693c284f9a.jpg', ['alt' => 'Программирование PLC Xinje', 'width' => '60', 'height'=> '60']) ?>
				<span>Программиро-<br>вание PLC Xinje</span>
			</article>
		</div>
	</div>
</aside>