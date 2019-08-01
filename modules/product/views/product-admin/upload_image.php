<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
 // debug($product->image);
?>

<div class="product-image-form">

    <h1>Изображение продукта: <span class="text-info"><?=$product->preview?></span></h1>
    <? if ($product->image): ?>
        <img class="img-thumbnail" src="<?printf('/web/images/%s/%s', $product->image->subdir, $product->image->filename);?>">
    <? else: ?>
        <span class="text-danger">Изображения еще нет</span>
    <? endif; ?>

    <!-- message -->
    <div class="alert alert-info" style="margin-top: 20px;">
        Если у продукта существует изображение обо будет заменено.
    </div>

    <div class="panel panel-default" style="margin-top: 20px;">
        <div class="panel-heading">Форма для добавления изображения продукту</div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'imageFile')->fileInput()->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>  
    

</div>
