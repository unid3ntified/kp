<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MgwBcuId;

/**
 * MgwBcuIdSearch represents the model behind the search form about `app\models\MgwBcuId`.
 */
class MgwBcuIdSearch extends MgwBcuId
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mgw_name', 'bcu_id', 'old_mss_connected', 'new_mss_connected'], 'safe'],
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
        if (is_array($params) or is_numeric($params))
            $query = MgwBcuId::find();
        else 
            $query = MgwBcuId::find()->where(['mgw_name' => $params]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'mgw_name', $this->mgw_name])
            ->andFilterWhere(['like', 'bcu_id', $this->bcu_id])
            ->andFilterWhere(['like', 'old_mss_connected', $this->old_mss_connected])
            ->andFilterWhere(['like', 'new_mss_connected', $this->new_mss_connected]);

        return $dataProvider;
    }
}
