
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\filter\Category;
?>

<h1>Форма для заказа пневмоцилиндра</h1>

<div class="order-form-cylinder">

    <?php $form = ActiveForm::begin(['action' => ['/order/add-cylinder']]); ?>

    <!-- series cylinder -->
    <?= $form->field($model, 'id_cat')->dropDownList($series, ['prompt' => 'Не выбрана'])->label('Серия пневмоцилиндра'); ?>

    <!-- cylinder diameter-->
    <?= $form->field($model, 'diameter')->dropDownList($diameters, ['prompt' => 'Не выбран'])->label('Диаметр поршня'); ?>
    
    <!-- cylinder length -->
    <?= $form->field($model, 'length')->textInput()->label('Длина цилиндра,мм') ?>

     <!-- cylinder count -->
    <?= $form->field($model, 'qty')->textInput(['type' => 'number', 'value' => 1])->label('Количество') ?>

    <?= $form->field($model, 'magnit')->radioList(['yes' => 'С магнитом', 'no' => 'Без магнита'])->label('Наличие магнита на поршне') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить в корзину', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>