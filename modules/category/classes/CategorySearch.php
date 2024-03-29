<?php

namespace app\modules\category\classes;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\category\classes\Category;

/**
 * CategorySearch represents the model behind the search form of `app\modules\category\classes\Category`.
 */
class CategorySearch extends Category
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_parent', 'status'], 'integer'],
            [['name', 'description'], 'safe'],
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
        $query = Category::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider(['query' => $query, 'pagination' => ['pageSize' => 10]]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_parent' => $this->id_parent,
            'status' => self::STATUS_ACTIVE,
            'IBLOCK_ID' => [14], //32
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
