<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);

?>

<div class="category-view">

    <h1>Фильтр: <span class="text-success"><?=$this->title?></span></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот фильтр?',
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a('Элементы фильтра', ['filter-item-admin/index', 'id_filter' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'title',
        ],
    ]) ?>

</div>
