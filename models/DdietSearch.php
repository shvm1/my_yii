<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ddiet;

/**
 * DdietSearch represents the model behind the search form about `app\models\Ddiet`.
 */
class DdietSearch extends Ddiet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dd_id', 'dd_kal', 'dd_status_del', 'u_create', 'u_update', 'v_update', 'v_create'], 'integer'],
            [['dd_title'], 'safe'],
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
        $query = Ddiet::find();

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
            'dd_id' => $this->dd_id,
            'dd_kal' => $this->dd_kal,
            'dd_status_del' => $this->dd_status_del,
            'u_create' => $this->u_create,
            'u_update' => $this->u_update,
            'v_update' => $this->v_update,
            'v_create' => $this->v_create,
        ]);

        $query->andFilterWhere(['like', 'dd_title', $this->dd_title]);

        return $dataProvider;
    }
}
