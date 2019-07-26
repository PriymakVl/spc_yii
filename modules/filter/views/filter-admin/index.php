<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\filter\classes\Filter;

$this->title = 'Фильтры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать фильтр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'title', 'label' => 'Название'],
            ['class' => 'yii\grid\ActionColumn', 'header' => 'Операции'],
        ],
    ]); ?>


</div>
