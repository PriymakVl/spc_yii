<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\category\classes\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\category\classes\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать Категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            ['attribute' => 'id_parent', 
                'value' => function($model) {return Category::findOne($model->id_parent)->name;}, 
                'filter' => (new Category)->getForSelect(),
            ],
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
