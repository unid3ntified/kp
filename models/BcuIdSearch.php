<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BcuId;

/**
 * BcuIdSearch represents the model behind the search form about `app\models\BcuId`.
 */
class BcuIdSearch extends BcuId
{
    public $search;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search','bcu_id', 'mgw_name', 'pool', 'region', 'old_mss_connected', 'new_mss_connected', 'status', 'log_date', 'remark'], 'safe'],
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
        $query = BcuId::find();
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

        $query->orFilterWhere(['like', 'bcu_id', $this->search])
            ->orFilterWhere(['like', 'mgw_name', $this->search])
            ->orFilterWhere(['like', 'pool', $this->search])
            ->orFilterWhere(['like', 'region', $this->search])
            ->orFilterWhere(['like', 'old_mss_connected', $this->search])
            ->orFilterWhere(['like', 'new_mss_connected', $this->search])
            ->orFilterWhere(['like', 'status', $this->search]);
           // ->orFilterWhere(['like', 'remark', $this->search]);

        return $dataProvider;
    }

    public function searchId($params, $id)
    {
        $query = BcuId::find()->onCondition(['mgw_name' => $id]);

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

        $query->andFilterWhere(['like', 'bcu_id', $this->bcu_id])
            ->andFilterWhere(['like', 'mgw_name', $this->mgw_name])
            ->andFilterWhere(['like', 'pool', $this->pool])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'old_mss_connected', $this->old_mss_connected])
            ->andFilterWhere(['like', 'new_mss_connected', $this->new_mss_connected])
            ->andFilterWhere(['like', 'status', $this->status]);
           // ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
