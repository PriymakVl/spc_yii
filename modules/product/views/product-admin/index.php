<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\category\classes\Category;
use app\modules\product\classes\ProductPrice;

function createLinkImage($model)
{
    return sprintf('<a class="product-image-link %s" href="/product/product-admin/upload-image?id_prod=%s">%s</a>', 
        $model->image ? '' : 'text-danger', $model->id, $model->image ? 'есть' : 'нет');
}

function createLinkPrice($model)
{
    $price = (new ProductPrice)->selectByIdProduct($model->id);
    return sprintf('<a class="product-price-link %s" href="/product/product-admin/update-price?id_prod=%s">%s</a>', 
        $price ? '' : 'text-danger', $model->id, $price ? $price->value.' '.$price->currency : 'не задана');
}

$this->title = 'Продукты';
?>
<!-- style link -->
<style type="text/css">
    .product-price-link, .product-image-link{
        text-decoration: underline;
        cursor: pointer;
        font-style: italic;
    }

    .product-price-link:hover, .product-image-link:hover {
        text-decoration: none;
    }
</style>

<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'description:ntext',
            ['attribute' => 'price', 'header' => 'Цена', 'format' => 'raw', 'headerOptions' => ['class' => 'text-info'], 'value'=> function ($model) {return createLinkPrice($model);}],
            ['attribute' => 'id_cat', 
            'value' => function($model) {return Category::findOne($model->id_cat)->name;}, 
            'filter' => (new Category)->convertForSelectMainWithSubcategory(),
            ],
            ['attribute' => 'image', 'header' => 'Изображение', 'format' => 'raw', 'headerOptions' => ['class' => 'text-info'],
            'value' => function($model) {return createLinkImage($model);}],
            // 'IBLOCK_ID',
            //'status',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:100px;'],
            'headerOptions' => ['class' => 'text-info'], 'header' => 'Операции',
            ], //'template' => '{delete}'
        ]
    ]); ?>


</div>
