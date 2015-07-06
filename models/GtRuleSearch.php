<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GtRule;

/**
 * GtRuleSearch represents the model behind the search form about `app\models\GtRule`.
 */
class GtRuleSearch extends GtRule
{
    public $search;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['search', 'STP', 'Area', 'Equipment', 'GT', 'Last_counter', 'Remark'], 'safe'],
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
        $query = GtRule::find();

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
            'No' => $this->No,
        ]);

        $query->orFilterWhere(['like', 'STP', $this->search])
            ->orFilterWhere(['like', 'Area', $this->search])
            ->orFilterWhere(['like', 'Equipment', $this->search])
            ->orFilterWhere(['like', 'GT', $this->search])
            ->orFilterWhere(['like', 'Last_counter', $this->search])
            ->orFilterWhere(['like', 'Remark', $this->search]);

        return $dataProvider;
    }
}
