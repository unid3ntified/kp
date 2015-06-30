<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GtProposedlist;

/**
 * GtProposedlistSearch represents the model behind the search form about `app\models\GtProposedlist`.
 */
class GtProposedlistSearch extends GtProposedlist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['Regional', 'MSS', 'GT', 'new_GT', 'Status', 'Remark'], 'safe'],
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
        $query = GtProposedlist::find();

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

        $query->andFilterWhere(['like', 'Regional', $this->Regional])
            ->andFilterWhere(['like', 'MSS', $this->MSS])
            ->andFilterWhere(['like', 'GT', $this->GT])
            ->andFilterWhere(['like', 'new_GT', $this->new_GT])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Remark', $this->Remark]);

        return $dataProvider;
    }
}
