<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrunkInterkoneksi;

/**
 * TrunkInterkoneksiSearch represents the model behind the search form about `app\models\TrunkInterkoneksi`.
 */
class TrunkInterkoneksiSearch extends TrunkInterkoneksi
{
    public $search;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trunk_id', 'direction', 'vendor', 'opc', 'dpc', 'POI', 'connection', 't_group', 'status', 'log_date', 'remark', 'search'], 'safe'],
            [['e1_capacity'], 'integer'],
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
        $query = TrunkInterkoneksi::find();

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
            'e1_capacity' => $this->search,
            'log_date' => $this->search,
        ]);

        $query->orFilterWhere(['like', 'trunk_id', $this->search])
            ->orFilterWhere(['like', 'direction', $this->search])
            ->orFilterWhere(['like', 'vendor', $this->search])
            ->orFilterWhere(['like', 'opc', $this->search])
            ->orFilterWhere(['like', 'dpc', $this->search])
            ->orFilterWhere(['like', 'POI', $this->search])
            ->orFilterWhere(['like', 'connection', $this->search])
            ->orFilterWhere(['like', 't_group', $this->search])
            ->orFilterWhere(['like', 'status', $this->search]);
            //->orFilterWhere(['like', 'remark', $this->search]);
        return $dataProvider;
    }

     public function searchID($params, $id)
    {
        $query = TrunkInterkoneksi::find()->onCondition(['poi' => $id]);

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
            'e1_capacity' => $this->e1_capacity,
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'trunk_id', $this->trunk_id])
            ->andFilterWhere(['like', 'direction', $this->direction])
            ->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'opc', $this->opc])
            ->andFilterWhere(['like', 'dpc', $this->dpc])
            ->andFilterWhere(['like', 'POI', $this->POI])
            ->andFilterWhere(['like', 'connection', $this->connection])
            ->andFilterWhere(['like', 't_group', $this->t_group])
            ->andFilterWhere(['like', 'status', $this->status]);
          //  ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
