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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_mgw', 'pool', 'vendor', 'provinsi', 'location', 'bcu_id', 'status', 'log_date', 'remark'], 'safe'],
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

        $query->andFilterWhere([
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'name_mgw', $this->name_mgw])
            ->andFilterWhere(['like', 'pool', $this->pool])
            ->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'bcu_id', $this->bcu_id])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
