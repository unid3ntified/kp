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
            [['network_element', 'pool', 'location', 'provinsi', 'vendor', 'sc_address', 'gtt', 'opc_nat1', 'opc_nat0', '2nd_OPC', '3rd_OPC', '4th_OPC', '5th_OPC', '6th_OPC', 'INAT0', 'status', 'log_date', 'remark'], 'safe'],
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

        $query->andFilterWhere(['like', 'network_element', $this->network_element])
            ->andFilterWhere(['like', 'pool', $this->pool])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'sc_address', $this->sc_address])
            ->andFilterWhere(['like', 'gtt', $this->gtt])
            ->andFilterWhere(['like', 'opc_nat1', $this->opc_nat1])
            ->andFilterWhere(['like', 'opc_nat0', $this->opc_nat0])
            ->andFilterWhere(['like', '2nd_OPC', $this->2nd_OPC])
            ->andFilterWhere(['like', '3rd_OPC', $this->3rd_OPC])
            ->andFilterWhere(['like', '4th_OPC', $this->4th_OPC])
            ->andFilterWhere(['like', '5th_OPC', $this->5th_OPC])
            ->andFilterWhere(['like', '6th_OPC', $this->6th_OPC])
            ->andFilterWhere(['like', 'INAT0', $this->INAT0])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
