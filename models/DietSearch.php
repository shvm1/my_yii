<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diet;

/**
 * DietSearch represents the model behind the search form about `app\models\Diet`.
 */
class DietSearch extends Diet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['d_id', 'd_kal', 'v_update', 'v_create'], 'integer'],
            [['d_title'], 'safe'],
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
        $query = Diet::find();

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
            'd_id' => $this->d_id,
            'd_kal' => $this->d_kal,
            'v_update' => $this->v_update,
            'v_create' => $this->v_create,
        ]);

        $query->andFilterWhere(['like', 'd_title', $this->d_title]);

        return $dataProvider;
    }
}
