<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DescNetwork;

/**
 * DescNetworkSearch represents the model behind the search form about `app\models\DescNetwork`.
 */
class DescNetworkSearch extends DescNetwork
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['network_id', 'opc_nat0', 'opc_nat1', 'desc_network', 'inat0', 'second_opc', 'third_opc', 'fourth_opc', 'fifth_opc', 'sixth_opc'], 'safe'],
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
        $query = DescNetwork::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'network_id', $this->network_id])
            ->andFilterWhere(['like', 'opc_nat0', $this->opc_nat0])
            ->andFilterWhere(['like', 'opc_nat1', $this->opc_nat1])
            ->andFilterWhere(['like', 'desc_network', $this->desc_network])
            ->andFilterWhere(['like', 'inat0', $this->inat0])
            ->andFilterWhere(['like', 'second_opc', $this->second_opc])
            ->andFilterWhere(['like', 'third_opc', $this->third_opc])
            ->andFilterWhere(['like', 'fourth_opc', $this->fourth_opc])
            ->andFilterWhere(['like', 'fifth_opc', $this->fifth_opc])
            ->andFilterWhere(['like', 'sixth_opc', $this->sixth_opc]);

        return $dataProvider;
    }

     public function searchId($params, $id)
    {
        $query = DescNetwork::find()->onCondition(['network_id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'network_id', $this->network_id])
            ->andFilterWhere(['like', 'opc_nat0', $this->opc_nat0])
            ->andFilterWhere(['like', 'opc_nat1', $this->opc_nat1])
            ->andFilterWhere(['like', 'desc_network', $this->desc_network])
            ->andFilterWhere(['like', 'inat0', $this->inat0])
            ->andFilterWhere(['like', 'second_opc', $this->second_opc])
            ->andFilterWhere(['like', 'third_opc', $this->third_opc])
            ->andFilterWhere(['like', 'fourth_opc', $this->fourth_opc])
            ->andFilterWhere(['like', 'fifth_opc', $this->fifth_opc])
            ->andFilterWhere(['like', 'sixth_opc', $this->sixth_opc]);

        return $dataProvider;
    }
}
