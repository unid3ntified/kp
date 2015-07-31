<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bsc;

/**
 * BscSearch represents the model behind the search form about `app\models\Bsc`.
 */
class BscSearch extends Bsc
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search', 'bsc_id', 'mgw', 'msc', 'trunk_name', 'log_date', 'remark', 'year'], 'safe'],
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
        $query = Bsc::find();

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
            'year'  => $this->search,
        ]);

        $query->orFilterWhere(['like', 'bsc_id', $this->search])
            ->orFilterWhere(['like', 'mgw', $this->search])
            ->orFilterWhere(['like', 'msc', $this->search])
            ->orFilterWhere(['like', 'trunk_name', $this->search]);
            //->orFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }

    public function searchid($params, $id)
    {
        $query = Bsc::find()->onCondition(['bsc_id' => $id]);

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
            'year'  => $this->search,
        ]);

        $query->orFilterWhere(['like', 'bsc_id', $this->search])
            ->orFilterWhere(['like', 'mgw', $this->search])
            ->orFilterWhere(['like', 'msc', $this->search])
            ->orFilterWhere(['like', 'trunk_name', $this->search]);
            //->orFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
