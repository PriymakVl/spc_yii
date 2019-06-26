<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\category\classes\Category;

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
            'code',
            'name',
            //'description:ntext',
            'price',
            //'id_cat',
            ['attribute' => 'id_cat', 
            'value' => function($model) {return Category::findOne($model->id_cat)->name;}, 
            'filter' => (new Category)->getForSelect()
            ],
            //'status',

            ['class' => 'yii\grid\ActionColumn', ], //'template' => '{delete}'
        ],
    ]); ?>


</div>
