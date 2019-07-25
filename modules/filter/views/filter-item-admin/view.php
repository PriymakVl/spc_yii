<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;

\yii\web\YiiAsset::register($this);

?>

<div class="filter-item-view">

    <h1>Элемент фильтра: <span class="text-info"><?=$model->filter->title?></span></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id_item' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_item' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот элемент фильтра?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Элементы фильтра', ['index', 'id_filter' => $model->id_filter], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'name', 'label' => 'Название'],
            ['attribute' => 'rating', 'label' => 'Рейтинг']
        ],
    ]) ?>

</div>
