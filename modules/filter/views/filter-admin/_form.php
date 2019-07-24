<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<!-- css -->
<!-- <link rel="stylesheet" href="/web/css/admin/form.css"> -->

<div class="filter-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <!-- filter name -->
    <?= $form->field($model, 'name')->textInput()->label('Название') ?>

    <!-- filter title -->
    <?= $form->field($model, 'title')->textInput()->label('Заголовок') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <? if ($model->id): ?>
            <?= Html::a('Отменить', ['filter-admin/view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <? else: ?>
            <?= Html::a('Отменить', ['filter-admin/index'], ['class' => 'btn btn-primary']) ?>
        <? endif; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
