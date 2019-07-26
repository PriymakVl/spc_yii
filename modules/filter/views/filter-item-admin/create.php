<?php

use yii\helpers\Html;


$this->title = 'Создание элемента фильтра';
$this->params['breadcrumbs'][] = ['label' => 'Фильтры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-create">

    <h1>
		<? printf('%s : <span class="text-info">%s</span>', $this->title, $filter->title); ?>
	</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'filter' => $filter,
    ]) ?>

</div>
