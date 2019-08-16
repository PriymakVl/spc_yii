<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\filter\classes\Filter;

$this->title = 'Фильтры продукта';
?>
<div class="filters-product">

    <h1>
    	<? printf('%s: <span class="text-info">%s</span>', $this->title, $product->name); ?>
    </h1>

  	<form action="/product/product-admin/save-filters">
  		<!-- id product -->
  		<input type="hidden" name="id_prod" value="<?=$product->id?>">

        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th width="40">№</th>
                <th class="text-primary">Наименование фильтра</th>
                <th class="text-primary">Значение фильтра</th>
                <th class="text-primary">Операции</th>
            </tr>
            <? if ($product->category->filters): ?>
                <? $number = 1; ?>
                <? foreach($product->category->filters as $filter): ?>
                    <? if ($filter->name == 'price') continue; ?>
                    <tr >
                        <td><?=$number?></td>
                        <!-- fiters title -->
                        <td class="<?=(in_array($filter->id, $prod_filters)) ? 'text-info' : ''?>">
                            <?=$filter->title?>
                        </td>
                        <!-- filters item -->
                        <td>
                            <? 
                                $item = $product->getItemFilter($filter->id);
                                echo $item ? $item->name : '<i class="text-danger">не указано</i>';
                            ?> 
                        </td>
                        <!-- actions filter product -->
                        <td>
                            <!-- select item filter for product -->
                            <? $url = sprintf('/product/product-admin/update-filter?id_prod=%s&id_filter=%s', $product->id, $filter->id); ?>
                            <a href="<?=$url?>" title="Настроить">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                    </tr>
                    <? $number++; ?>
                <? endforeach; ?>
            <? else: ?>
                <td colspan="3" class="text-danger">Фильтров еще нет</td>
            <? endif; ?>
        </table>
        <!-- buttons block -->
        <? if ($cat_filters): ?>
    	    <div class="form-group">
    	        <input type="submit" value="Сохранить" class="btn btn-success" nam="save">
    			<a href="javascript:history.back()" class="btn btn-info">Отменить</a>
    	    </div>
        <? endif; ?>
	 </form>
    <?= Html::a('Продукт', ['view', 'id' => $product->id], ['class' => 'btn btn-info']) ?>
</div>
