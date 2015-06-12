<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DummyNumber;

/**
 * DummyNumberSearch represents the model behind the search form about `app\models\DummyNumber`.
 */
class DummyNumberSearch extends DummyNumber
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_msc', 'trunk_group', 'dummy_number', 'status', 'log_date', 'remark'], 'safe'],
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
        $query = DummyNumber::find();

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

        $query->andFilterWhere(['like', 'name_msc', $this->name_msc])
            ->andFilterWhere(['like', 'trunk_group', $this->trunk_group])
            ->andFilterWhere(['like', 'dummy_number', $this->dummy_number])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
