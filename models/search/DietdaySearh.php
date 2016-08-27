<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dietday;

/**
 * DietdaySearh represents the model behind the search form about `app\models\Dietday`.
 */
class DietdaySearh extends Dietday
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'diet_id', 'num', 'status_del'], 'integer'],
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
        $query = Dietday::find();

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
            'diet_id' => $this->diet_id,
            'num' => $this->num,
            'status_del' => $this->status_del,
        ]);

        return $dataProvider;
    }
}
