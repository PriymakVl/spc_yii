<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\category\classes\Category;

?>

<style>
    .form-price-wrp {
        display: flex;
    }

    .form-price-wrp .field-product-price {
        margin-right: 30px;
    }
</style>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preview')->textInput(['maxlength' => true])->label("Краткое описание") ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'id_cat')->textInput() ?>
    <?= $form->field($model, 'id_cat')->dropdownList((new Category)->convertForSelectMainWithSubcategory(), ['prompt' => 'Не выбрана']); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отменить', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
