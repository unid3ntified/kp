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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['STP', 'Area', 'Equipment', 'GT', 'Last_counter', 'Remark'], 'safe'],
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

        $query->andFilterWhere([
            'No' => $this->No,
        ]);

        $query->andFilterWhere(['like', 'STP', $this->STP])
            ->andFilterWhere(['like', 'Area', $this->Area])
            ->andFilterWhere(['like', 'Equipment', $this->Equipment])
            ->andFilterWhere(['like', 'GT', $this->GT])
            ->andFilterWhere(['like', 'Last_counter', $this->Last_counter])
            ->andFilterWhere(['like', 'Remark', $this->Remark]);

        return $dataProvider;
    }
}
