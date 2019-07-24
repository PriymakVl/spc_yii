<?php

namespace app\modules\filter\classes;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\filter\classes\Filter;


class FilterSearch extends Filter
{

    public function rules()
    {
        return [
            [['name', 'title'], 'string'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Filter::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider(['query' => $query, 'pagination' => ['pageSize' => 10]]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['name' => $this->name, 'status' => self::STATUS_ACTIVE,]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
