<?php

namespace app\modules\product\classes;

use yii\web\NotFoundHttpException;

use app\models\ModelBase;

class ProductPrice extends ModelBase {

	public static function tableName()
    {
        return '{{products_prices}}';
    }

    public function selectByIdProduct($id_prod)
    {
        return self::find()->where(['id_prod' => $id_prod])->limit(1)->one();
    }

    public function rules()
    {
        return [
            [['value', 'currency'], 'string', 'max' => 20],
            // [['value', 'currency'], 'required'],
        ];
    }

    public function validate()
    {
    	if (parent::validate()) return $this;
    	throw new NotFoundHttpException('Ошибка при валидации');
    }

    public function savePrice($form)
    {
    	$this->value = $form->value;
    	$this->currency = $form->currency;
        $this->id_prod = $form->id_prod;
    	if ($this->save()) return $this;
    	throw new NotFoundHttpException('Ошибка при назначении цены');
    }
   
}
