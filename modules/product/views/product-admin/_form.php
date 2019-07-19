<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
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

    <?= $form->field($model, 'preview')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-price-wrp">
        <?= $form->field($model, 'price')->textInput(['value' => $model->price->value]) ?>
        <?= $form->field($model, 'currency')->textInput(['value' => $model->price->currency]) ?>
    </div>

    <?//= $form->field($model, 'id_cat')->textInput() ?>
    <?= $form->field($model, 'id_cat')->dropdownList($model->getCategoriesForSelect()); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
