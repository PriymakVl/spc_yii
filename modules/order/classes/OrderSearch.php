<?php

namespace app\modules\order\classes;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\classes\Product;

class OrderSearch extends Order
{
    public $price;

    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['id_cat'],'integer'],
            [['name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider(['query' => $query, 'pagination' => ['pageSize' => 10]]);

        //$dataProvider->pagination->pageSize = 2;

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_cat' => $this->id_cat,
            'status' => Product::STATUS_ACTIVE,
            'IBLOCK_ID' => [14], //32
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
            //->andFilterWhere(['like', 'description', $this->description])
            //->andFilterWhere(['like', 'price', $this->price]);

        return $dataProvider;
    }
}
