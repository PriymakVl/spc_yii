<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="filter-item-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <!-- filter name -->
    <?= $form->field($model, 'name')->textInput()->label('Название') ?>

    <!-- filter rating -->
    <?= $form->field($model, 'rating')->textInput()->label('Рейтинг') ?>

    <!-- filter id -->
    <? if (!$model->id_filter): ?>
        <?= $form->field($model, 'id_filter')->hiddenInput(['value' => $filter->id])->label(false) ?>
    <? endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <? if ($model->id): ?>
            <?= Html::a('Отменить', ['filter-item-admin/view', 'id_item' => $model->id], ['class' => 'btn btn-primary']) ?>
        <? else: ?>
            <?= Html::a('Отменить', ['filter-item-admin/index'], ['class' => 'btn btn-primary']) ?>
        <? endif; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
