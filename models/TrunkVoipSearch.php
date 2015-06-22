<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrunkVoip;

/**
 * TrunkVoipSearch represents the model behind the search form about `app\models\TrunkVoip`.
 */
class TrunkVoipSearch extends TrunkVoip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trunk_id','mgw', 'mss', 'detail', 'direction', 'konfigurasi', 'partner', 'opc_mss', 'dpc', 'voip_gateway', 'status', 'log_date', 'remark'], 'safe'],
            [['e1'], 'integer'],
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
        $query = TrunkVoip::find();

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
            'e1' => $this->e1,
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'trunk_id', $this->trunk_id])
            ->andFilterWhere(['like', 'mss', $this->mss])
            ->andFilterWhere(['like', 'mgw', $this->mgw])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'direction', $this->direction])
            ->andFilterWhere(['like', 'konfigurasi', $this->konfigurasi])
            ->andFilterWhere(['like', 'partner', $this->partner])
            ->andFilterWhere(['like', 'opc_mss', $this->opc_mss])
            ->andFilterWhere(['like', 'dpc', $this->dpc])
            ->andFilterWhere(['like', 'voip_gateway', $this->voip_gateway])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
