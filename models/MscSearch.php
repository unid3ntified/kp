<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Msc;

/**
 * MscSearch represents the model behind the search form about `app\models\Msc`.
 */
class MscSearch extends Msc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['msc_name', 'cnid', 'pool', 'non_broadcast_lai', 'null_nri', 'nri_msc', 'spc_msc', 'nb_lai', 'msc_IP_sigtran1', 'msc_IP_sigtran2', 'status', 'remark'], 'safe'],
            [['cap_value', 'msc_index', 'mgw_proxyA_flex', 'mgw_managerA_circuit', 'log_date'], 'integer'],
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
        $query = Msc::find();

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
            'cap_value' => $this->cap_value,
            'msc_index' => $this->msc_index,
            'mgw_proxyA_flex' => $this->mgw_proxyA_flex,
            'mgw_managerA_circuit' => $this->mgw_managerA_circuit,
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'msc_name', $this->msc_name])
            ->andFilterWhere(['like', 'cnid', $this->cnid])
            ->andFilterWhere(['like', 'pool', $this->pool])
            ->andFilterWhere(['like', 'non_broadcast_lai', $this->non_broadcast_lai])
            ->andFilterWhere(['like', 'null_nri', $this->null_nri])
            ->andFilterWhere(['like', 'nri_msc', $this->nri_msc])
            ->andFilterWhere(['like', 'spc_msc', $this->spc_msc])
            ->andFilterWhere(['like', 'nb_lai', $this->nb_lai])
            ->andFilterWhere(['like', 'msc_IP_sigtran1', $this->msc_IP_sigtran1])
            ->andFilterWhere(['like', 'msc_IP_sigtran2', $this->msc_IP_sigtran2])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }

    public function searchID($params, $id)
    {
        $query = Msc::find()->onCondition(['msc_name' => $id]);

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
            'cap_value' => $this->cap_value,
            'msc_index' => $this->msc_index,
            'mgw_proxyA_flex' => $this->mgw_proxyA_flex,
            'mgw_managerA_circuit' => $this->mgw_managerA_circuit,
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'msc_name', $this->msc_name])
            ->andFilterWhere(['like', 'cnid', $this->cnid])
            ->andFilterWhere(['like', 'pool', $this->pool])
            ->andFilterWhere(['like', 'non_broadcast_lai', $this->non_broadcast_lai])
            ->andFilterWhere(['like', 'null_nri', $this->null_nri])
            ->andFilterWhere(['like', 'nri_msc', $this->nri_msc])
            ->andFilterWhere(['like', 'spc_msc', $this->spc_msc])
            ->andFilterWhere(['like', 'nb_lai', $this->nb_lai])
            ->andFilterWhere(['like', 'msc_IP_sigtran1', $this->msc_IP_sigtran1])
            ->andFilterWhere(['like', 'msc_IP_sigtran2', $this->msc_IP_sigtran2])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
