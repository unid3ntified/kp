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
            [['trunk', 'partner', 'voip_gateway', 'connection', 'direction', 'vendor', 'mss', 'mgw', 'ip_partner', 'ip_xl', 'sa_name', 'status', 'log_date', 'remark'], 'safe'],
            [['ip_realm', 'e1_capacity'], 'integer'],
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
            'ip_realm' => $this->ip_realm,
            'e1_capacity' => $this->e1_capacity,
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'trunk', $this->trunk])
            ->andFilterWhere(['like', 'partner', $this->partner])
            ->andFilterWhere(['like', 'voip_gateway', $this->voip_gateway])
            ->andFilterWhere(['like', 'connection', $this->connection])
            ->andFilterWhere(['like', 'direction', $this->direction])
            ->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'mss', $this->mss])
            ->andFilterWhere(['like', 'mgw', $this->mgw])
            ->andFilterWhere(['like', 'ip_partner', $this->ip_partner])
            ->andFilterWhere(['like', 'ip_xl', $this->ip_xl])
            ->andFilterWhere(['like', 'sa_name', $this->sa_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
