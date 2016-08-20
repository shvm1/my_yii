<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dish;

/**
 * DishSearch represents the model behind the search form about `app\models\Dish`.
 */
class DishSearch extends Dish
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kal', 'weight', 'status_del'], 'integer'],
            [['title', 'url', 'image', 'description'], 'safe'],
            [['protein', 'fat', 'carbohydrate', 'price'], 'number'],
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
        $query = Dish::find()->with(['vitamins']);

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
            'kal' => $this->kal,
            'protein' => $this->protein,
            'fat' => $this->fat,
            'carbohydrate' => $this->carbohydrate,
            'weight' => $this->weight,
            'price' => $this->price,
            'status_del' => $this->status_del,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
