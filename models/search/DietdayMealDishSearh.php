<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DietdayMealDish;

/**
 * DietdayMealDishSearh represents the model behind the search form about `app\models\DietdayMealDish`.
 */
class DietdayMealDishSearh extends DietdayMealDish
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dietday_id', 'meal_id', 'dish_id'], 'integer'],
            [['value'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = DietdayMealDish::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dietday_id' => $this->dietday_id,
            'meal_id' => $this->meal_id,
            'dish_id' => $this->dish_id,
            'value' => $this->value,
        ]);

        return $dataProvider;
    }
}
