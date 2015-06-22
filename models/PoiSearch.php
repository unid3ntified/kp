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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poi', 'msc_name', 'address', 'MSRN', 'dummy_number', 'log_date', 'remark'], 'safe'],
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

        $query->andFilterWhere([
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'poi', $this->poi])
            ->andFilterWhere(['like', 'msc_name', $this->msc_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'MSRN', $this->MSRN])
            ->andFilterWhere(['like', 'dummy_number', $this->dummy_number])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
