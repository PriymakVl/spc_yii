<?php

use yii\helpers\Html;

$this->title = 'Редактирование элемента фильтра';

?>

<div class="filter-item-update">

    <h1><?= $this->title.': <span class="text-info">'.$model->name.'</span>' ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
