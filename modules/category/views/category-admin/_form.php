<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\filter\Filter;
?>
<!-- css -->
<link rel="stylesheet" href="/web/css/admin/form.css">

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- name -->
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- parent -->
     <?= $form->field($model, 'id_parent')->dropDownList($model->convertForSelectMain(), ['prompt' => 'Не выбрана'])->label('Родительская категория') ?>
    
    <!-- description -->
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
