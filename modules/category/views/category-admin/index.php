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
        <?= Html::a('Главные категории', ['main'], ['class' => 'btn btn-info']) ?>
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
                'filter' => Category::find()->select(['name'])->where(['id_parent' => null, 'status' => Category::STATUS_ACTIVE])->asArray()->indexBy('id')->column(),
            ],
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
