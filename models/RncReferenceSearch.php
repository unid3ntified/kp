<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RncReference;

/**
 * RncReferenceSearch represents the model behind the search form about `app\models\RncReference`.
 */
class RncReferenceSearch extends RncReference
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search', 'rnc_id', 'rnc_name', 'pool', 'mgw_name', 'vendor_rnc', 'spc_nat0', 'trunk_name', 'rnc_location', 'status', 'log_date', 'remark'], 'safe'],
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
        $query = RncReference::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere([
            'log_date' => $this->search,
        ]);

        $query->orFilterWhere(['like', 'rnc_id', $this->search])
            ->orFilterWhere(['like', 'rnc_name', $this->search])
            ->orFilterWhere(['like', 'pool', $this->search])
            ->orFilterWhere(['like', 'mgw_name', $this->search])
            ->orFilterWhere(['like', 'vendor_rnc', $this->search])
            ->orFilterWhere(['like', 'spc_nat0', $this->search])
            ->orFilterWhere(['like', 'trunk_name', $this->search])
            ->orFilterWhere(['like', 'rnc_location', $this->search])
            ->orFilterWhere(['like', 'status', $this->search])
            ->orFilterWhere(['like', 'remark', $this->search]);

        return $dataProvider;
    }
    public function searchId($params, $id)
    {
        $query = RncReference::find()->onCondition(['mgw_name' => $id]);;

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

        $query->andFilterWhere(['like', 'rnc_id', $this->rnc_id])
            ->andFilterWhere(['like', 'rnc_name', $this->rnc_name])
            ->andFilterWhere(['like', 'pool', $this->pool])
            ->andFilterWhere(['like', 'mgw_name', $this->mgw_name])
            ->andFilterWhere(['like', 'vendor_rnc', $this->vendor_rnc])
            ->andFilterWhere(['like', 'spc_nat0', $this->spc_nat0])
            ->andFilterWhere(['like', 'trunk_name', $this->trunk_name])
            ->andFilterWhere(['like', 'rnc_location', $this->rnc_location])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
