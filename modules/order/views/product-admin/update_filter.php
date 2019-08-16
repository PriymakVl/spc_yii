<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>

 <h1>
     <? printf("Выбор элемента фильтра <i class='text-info'>%s</i> для продукта <i class='text-info'>%s</i>", $filter->title, $product->name); ?>
 </h1>

<div class="filter-item-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <!-- filter items -->
    <? $items_filter = ArrayHelper::map($filter->items, 'id', 'name'); ?>
    <? //debug($items_filter, false); ?>
    <? //debug($model->id_item); ?>
    <?= $form->field($model, 'id_item')->dropDownList($items_filter, ['prompt' => 'Не выбран'])->label('Элемент фильтра') ?>


    <!-- filter id -->
    <?= $form->field($model, 'id_filter')->hiddenInput(['value' => $filter->id])->label(false) ?>

     <!-- product id -->
    <?= $form->field($model, 'id_prod')->hiddenInput(['value' => $product->id])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отменить', ['product-admin/filters', 'id_prod' => $product->id], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
