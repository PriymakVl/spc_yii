<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\filter\Filter;
?>
<!-- css -->
<link rel="stylesheet" href="/web/css/admin/form.css">

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- parent -->
     <?= $form->field($model, 'id_parent')->dropDownList($model->convertForSelectMain(), ['prompt' => 'Не выбрана'])->label('Родительская категория') ?>

    <!-- filters -->
    <div class="admin-form-group">
        <h3 class="admin-form-group-title">Фильтры</h3>
        <? foreach ($model->filters as $filter): ?>
        <?= $form->field($model, 'filters' , ['template' => '{input} {label}'])->checkbox(['value' => $filter->id, ])->label($filter->title) ?>
        <? endforeach; ?>
    </div>
    

    <!-- description -->
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
