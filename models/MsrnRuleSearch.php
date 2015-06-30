<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MsrnRule;

/**
 * MsrnRuleSearch represents the model behind the search form about `app\models\MsrnRule`.
 */
class MsrnRuleSearch extends MsrnRule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cmn', 'area', 'equipment', 'new_msrn', 'last_counter', 'remark'], 'safe'],
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
        $query = MsrnRule::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'cmn', $this->cmn])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'equipment', $this->equipment])
            ->andFilterWhere(['like', 'new_msrn', $this->new_msrn])
            ->andFilterWhere(['like', 'last_counter', $this->last_counter])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
