<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// debug($filters_list);

/* @var $this yii\web\View */
/* @var $model app\modules\category\classes\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту категорию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            ['attribute' => 'id_parent', 'value' => function($model) {return $model->parent->name;}],
            ['attribute' => 'filters', 'format' => 'raw', 'value' => function($model){return $model->filters_list;}],
            ['attribute' => 'description', 'value' => function($model){return $model->description;}, 'format' => 'raw'],
        ],
    ]) ?>

</div>
