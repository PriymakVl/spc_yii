<?php

use yii\helpers\Html;
use app\modules\filter\classes\Filter;

$this->title = 'Фильтры категории';
?>
<div class="filters-category">

    <h1>
    	<? printf('%s: <span class="text-info">%s</span>', $this->title, $cat->name); ?>
    </h1>

  	<form action="/category/category-admin/save-filters">
  		<!-- id category -->
  		<input type="hidden" name="id_cat" value="<?=$cat->id?>">

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="40">
            	<input type="checkbox" disabled>
            </th>
            <th class="text-primary">Наименование</th>
            <th class="text-primary">Операции</th>
        </tr>
        <? if ($all_filters): ?>
            <? foreach($all_filters as $filter): ?>
                <tr >
                    <td>
						<input value="<?=$filter->id?>" type="checkbox" name="filters_new[]" <? if (in_array($filter->id, $cat_filters)) echo 'checked'?>>
                    </td>
                    <td class="<?=(in_array($filter->id, $cat_filters)) ? 'text-info' : ''?>"><?=$filter->title?></td>
                    <!-- actions filter category -->
                    <td>
                        <!-- select item filter for category -->
                        <a href="/filter/filter-item-admin/update?id_item=<?=$item->id?>" title="Настроить">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                </tr>
            <? endforeach; ?>
        <? else: ?>
            <td colspan="3" class="text-danger">Фильтров еще нет</td>
        <? endif; ?>
    </table>
    <!-- buttoons block -->
    <? if ($all_filters): ?>
	    <div class="form-group">
	        <input type="submit" value="Сохранить" class="btn btn-success" nam="save">
			<a href="javascript:history.back()" class="btn btn-info">Отменить</a>
	    </div>
    <? endif; ?>
	 </form>

</div>
