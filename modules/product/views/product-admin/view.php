<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->preview;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
 // debug($model->createListFilters());
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'preview',
            'description:ntext',
            // category
            ['attribute' => 'id_cat', 'label' => 'Категория', 'format' => 'raw', 'value' => function($model) {return $model->createBreadcrumbsCategories();}], 
            //price
            ['attribute' => 'price', 'label' => 'Цена', 'value' => function($model) {return $model->price->value.' '.$model->price->currency;}],
            ['attribute' => 'filters', 'label' => 'Фильтры', 'format' => 'raw', 'value' => function($model) {return $model->createListFilters();}],
            // 'status',
        ],
    ]) ?>

</div>
