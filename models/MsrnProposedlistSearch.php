<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MsrnProposedlist;

/**
 * MsrnProposedlistSearch represents the model behind the search form about `app\models\MsrnProposedlist`.
 */
class MsrnProposedlistSearch extends MsrnProposedlist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['Regional', 'MSS', 'Existing_MSRN', 'New_MSRN', 'Status', 'Reserved_by', 'Updated', 'Remark'], 'safe'],
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
        $query = MsrnProposedlist::find();

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
            ->andFilterWhere(['like', 'Existing_MSRN', $this->Existing_MSRN])
            ->andFilterWhere(['like', 'New_MSRN', $this->New_MSRN])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Reserved_by', $this->Reserved_by])
            ->andFilterWhere(['like', 'Updated', $this->Updated])
            ->andFilterWhere(['like', 'Remark', $this->Remark]);

        return $dataProvider;
    }
}
