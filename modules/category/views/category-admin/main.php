<?php

use yii\helpers\Html;

$this->title = 'Главные категории';
?>
<div class="main-category">

    <h1><?=$this->title?></h1>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="40">№</th>
            <th class="text-primary">Наименование</th>
            <th class="text-primary">Операции</th>
        </tr>
        <? if ($cats): ?>
            <? $number = 1; ?>
            <? foreach($cats as $cat): ?>
                <tr >
                    <td><?=$number?></td>
                    <td><?=$cat->name?></td>
                    <!-- actions main category -->
                    <td>
                        <!-- view category -->
                        <a href="/category/category-admin/view?id=<?=$cat->id?>" title="Просмотр">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                        &nbsp;&nbsp;&nbsp;
                        <!-- update category -->
                        <a href="/category/category-admin/update?id=<?=$cat->id?>" title="Редактировать">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                         &nbsp;&nbsp;&nbsp;
                        <!-- delete category -->
                        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $cat->id], [
                            'title' => 'Удалить',
                            'data' => [
                                'confirm' => 'Вы действительно хотите удалить эту категорию?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </td>
                </tr>
                <?$number++;?>
            <? endforeach; ?>
        <? else: ?>
            <td colspan="3" class="text-danger">Категорий еще нет</td>
        <? endif; ?>
    </table>
</div>
