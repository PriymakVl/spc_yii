<?php

namespace app\modules\product\classes;

use app\models\ModelBase;
use app\modules\filter\classes\Filter;

class ProductItemFilter extends ModelBase {

	public static function tableName()
    {
        return '{{products_items_filters}}';
    }

    public function getAll($id_prod)
    {
    	$items = $this->selectByIdProduct($id_prod);
    	if (!$items) return;
        foreach ($items as $item) {
        	$filter = Filter::find()->where(['id' => $item['id_filter']])->limit(1)->one();
        	$result[$filter->name] = $item['id_item'];
        }
        return $result;
    }

    public function selectByIdProduct($id_prod)
    {
        return self::find()->where(['id_prod' => $id_prod, 'status' => self::STATUS_ACTIVE])->asArray()->all();
    }

    public function saveItem($form)
    {
        $this->id_prod = $form->id_prod;
        $this->id_filter = $form->id_filter;
        $this->id_item = $form->id_item;
        return $this->save();
    }
   
}
