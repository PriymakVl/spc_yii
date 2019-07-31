<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\category\classes\Category;
use app\modules\product\classes\ProductPrice;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
?>

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
            ['attribute' => 'price', 'header' => 'Цена', 'headerOptions' => ['class' => 'text-info'], 'value'=> function ($model) {return (new ProductPrice)->selectByIdProduct($model->id)->value;}],
            ['attribute' => 'id_cat', 
            'value' => function($model) {return Category::findOne($model->id_cat)->name;}, 
            'filter' => (new Category)->convertForSelectMainWithSubcategory(),
            ],
            ['attribute' => 'image', 'label' => 'Изображение', 'format' => 'raw', 
            'value' => function($model) {return $model->image ? '<a href="/product/product-admin/upload-image"><i class="text-success">есть</i></a>' : '<a href="/product/product-admin/upload-image"><i class="text-danger">нет</i></a>';}],
            // 'IBLOCK_ID',
            //'status',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:100px;'],
            'headerOptions' => ['class' => 'text-info'], 'header' => 'Операции',
            ], //'template' => '{delete}'
        ]
    ]); ?>


</div>
