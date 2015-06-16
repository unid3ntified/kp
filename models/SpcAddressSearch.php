<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpcAddress;

/**
 * SpcAddressSearch represents the model behind the search form about `app\models\SpcAddress`.
 */
class SpcAddressSearch extends SpcAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['network_id', 'location', 'provinsi', 'vendor', 'gtt', 'second_OPC', 'third_OPC', 'fourth_OPC', 'fifth_OPC', 'sixth_OPC', 'INAT0', 'status', 'log_date', 'remark'], 'safe'],
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
        $query = SpcAddress::find();

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
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'network_id', $this->network_id])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'gtt', $this->gtt])
            ->andFilterWhere(['like', 'second_OPC', $this->second_OPC])
            ->andFilterWhere(['like', 'third_OPC', $this->third_OPC])
            ->andFilterWhere(['like', 'fourth_OPC', $this->fourth_OPC])
            ->andFilterWhere(['like', 'fifth_OPC', $this->fifth_OPC])
            ->andFilterWhere(['like', 'sixth_OPC', $this->sixth_OPC])
            ->andFilterWhere(['like', 'INAT0', $this->INAT0])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
