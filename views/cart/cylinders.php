<?php
	use app\modules\category\classes\Category;
	use yii\helpers\Html;
?>

<? foreach ($cart['cylinders'] as $index => $data): ?>
	<? $cat = Category::findOne(['id' => $data['id_cat']]); ?>
	<tr>
		<td>
			<?= Html::img(['@img/'.$cat->image->subdir.'/'.$cat->image->filename, ['alt' => $cat->name]]) ?>
		<td><?= $cat->getCodeCylinder($data) ?></td>
		<td><?= $cat->preview ?></td>
		<td>Согласовать</td>
		<td><?=$data['qty']?></td>
		<td>
			 <?= Html::a('удалить', ['/main/delete-item-cart', 'index' => $index, 'type' => 'cylinders']) ?>
		</td>
	</tr>
<? endforeach; ?>