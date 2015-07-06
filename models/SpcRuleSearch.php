<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpcRule;

/**
 * SpcRuleSearch represents the model behind the search form about `app\models\SpcRule`.
 */
class SpcRuleSearch extends SpcRule
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['search', 'Area', 'SPC', 'Jenis', 'Last_counter', 'Remark'], 'safe'],
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
        $query = SpcRule::find();

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

        $query->orFilterWhere(['like', 'Area', $this->search])
            ->orFilterWhere(['like', 'SPC', $this->search])
            ->orFilterWhere(['like', 'Jenis', $this->search])
            ->orFilterWhere(['like', 'Last_counter', $this->search])
            ->orFilterWhere(['like', 'Remark', $this->search]);

        return $dataProvider;
    }
}
