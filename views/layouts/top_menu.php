<?php
use app\assets\BaseAsset;
use yii\helpers\Html;
BaseAsset::register($this);
?>

<nav class="top-menu">
	<ul>
		<li>
			<a href="/sale/">Акции</a>
		</li>
		<li>
			<a href="/services/">Услуги</a>
		</li>
		<li>
			<a href="/help/" >Как купить</a>
			<ul>
				<li>
					<a href="/help/payment/">Условия оплаты</a>
				</li>
				<li>
					<a href="/help/delivery/">Условия доставки</a>
				</li>
				<li>
					<a href="/help/warranty/">Гарантия на товар</a>
				</li>
			</ul>
		</li>
					
		<li>
			<a href="/info/docs/" >Документация</a>
		</li>
		<li>
			<a href="/company/" >О компании</a>
			<ul>
				<li>
					<a href="/help/payment/">Новости</a>
				</li>
				<li>
					<a href="/help/delivery/">Сотрудники</a>
				</li>
				<li>
					<a href="/help/warranty/">Вакансии</a>
				</li>
			</ul>
		</li>		
		<li>
			<a href="/contacts">Контакты</a>
		</li>
	</ul>
</nav>
