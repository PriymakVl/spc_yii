<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>
     <? printf("Назначение цены для продукта <i class='text-info'>%s</i>", $product->preview); ?>
 </h1>

<div class="product-price-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <!-- price -->
     <?= $form->field($model, 'value')->textInput(['value' => $model->value])->label('Цена') ?>

	<!-- currency -->	
    <?= $form->field($model, 'currency')->dropDownList(['UAN' => 'UAN', 'RUB' => 'RUB'], ['prompt' => 'Не указана'])->label('Валюта') ?>

     <!-- product id -->
    <?= $form->field($model, 'id_prod')->hiddenInput(['value' => $product->id])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <a href="<?=Yii::$app->request->referrer?>" class="btn btn-primary">Отменить</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
