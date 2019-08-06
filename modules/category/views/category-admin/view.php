<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);

?>

<div class="category-view">

    <h1>
        <? if ($model->parent): ?>
            <a href="/"><?=$model->parent->name?></a><span> / </span> 
        <? endif; ?>
        <?= $model->name ?>
    </h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_cat' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту категорию?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Фильтры', ['category-admin/filters', 'id_cat' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Изображение', ['category-admin/upload-image', 'id_cat' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            ['attribute' => 'id_parent', 'value' => function($model) {return $model->parent->name;}],
            ['attribute' => 'filters', 'format' => 'raw', 'label' => 'Фильтры', 'value' => function($model){return $model->convertFiltersToList();}],
            ['attribute' => 'description', 'value' => function($model){return $model->description;}, 'format' => 'raw'],
        ],
    ]) ?>

</div>
