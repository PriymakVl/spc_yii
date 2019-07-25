<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\filter\classes\Filter;

$this->title = 'Элементы фильтра';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-item-index">

    <h1>
        <?= $this->title.': <span class="text-info">'.$filter->title.'</span>' ?>
    </h1>

    <p>
        <?= Html::a('Создать элемент', ['create', 'id_filter' => $filter->id], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th class="text-primary">#</th>
            <th class="text-primary">Наименование</th>
            <th class="text-primary">Райтинг</th>
            <th class="text-primary">Операции</th>
        </tr>
        <? if ($filter->items): ?>
            <? $number = 1; ?>
            <? foreach($filter->items as $item): ?>
                <tr>
                    <td><?=$number?></td>
                    <td>
                        <?= Html::a($item->name, ['filter-item-admin/view', 'id_item' => $item->id], ['style' => 'text-decoration:underline; color:green;']) ?>
                    </td>
                    <td><?=$item->rating?></td>
                    <!-- actions item filter -->
                    <td>
                        <!-- update item filter -->
                        <a href="/filter/filter-item-admin/update?id_item=<?=$item->id?>" title="Редактировать">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        &nbsp;&nbsp;&nbsp;
                        <!-- delete item filter -->
                         <a href="/filter/filter-item-admin/delete?id_item=<?=$item->id?>" title="Удалить">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                <? $number++; ?>
            <? endforeach; ?>
        <? else: ?>
            <td colspan="4" class="text-danger">Элементов еще нет</td>
        <? endif; ?>
    </table>


</div>
