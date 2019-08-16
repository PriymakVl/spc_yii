<?php

namespace app\modules\product\classes;

use app\models\ModelBase;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $price
 * @property int $id_cat
 * @property int $status
 * @property string price
 */

class ProductBase extends ModelBase {
    
    public static function tableName()
    {
        return '{{products}}';
    }

    public function rules()
    {
        return [
            [['name', 'id_cat', 'preview'], 'required'],
            [['description'], 'string'],
            [['id_cat', 'status'], 'integer'],
            [['name', 'preview'], 'string', 'max' => 255],
            //[['price'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'name' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'id_cat' => 'Категория',
            'status' => 'Status',
        ];
    }




}
