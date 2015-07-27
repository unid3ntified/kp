<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Poi;

/**
 * PoiSearch represents the model behind the search form about `app\models\Poi`.
 */
class PoiSearch extends Poi
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search', 'poi', 'msc_name', 'address', 'MSRN', 'dummy_number', 'log_date', 'remark'], 'safe'],
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
        $query = Poi::find();

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

        $query->orFilterWhere(['like', 'poi', $this->search])
            ->orFilterWhere(['like', 'msc_name', $this->search])
            ->orFilterWhere(['like', 'address', $this->search])
            ->orFilterWhere(['like', 'MSRN', $this->search])
            ->orFilterWhere(['like', 'dummy_number', $this->search]);
         //   ->orFilterWhere(['like', 'remark', $this->search]);

        return $dataProvider;
    }
}
