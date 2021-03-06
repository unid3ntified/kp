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
    public $search;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['search', 'Regional', 'MSS', 'Existing_MSRN', 'New_MSRN', 'Status', 'Reserved_by', 'Updated', 'Remark'], 'safe'],
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

        $query->orFilterWhere([
            'No' => $this->No,
        ]);

        $query->orFilterWhere(['like', 'Regional', $this->search])
            ->orFilterWhere(['like', 'MSS', $this->search])
            ->orFilterWhere(['like', 'Existing_MSRN', $this->search])
            ->orFilterWhere(['like', 'New_MSRN', $this->search])
            ->orFilterWhere(['like', 'Status', $this->search])
            ->orFilterWhere(['like', 'Reserved_by', $this->search])
            ->orFilterWhere(['like', 'Updated', $this->search]);
        //    ->orFilterWhere(['like', 'Remark', $this->search]);

        return $dataProvider;
    }

    public function searchId($params, $id)
    {
        $query = MsrnProposedlist::find()->onCondition(['MSS' => $id]);

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

        $query->orFilterWhere(['like', 'Regional', $this->search])
            ->orFilterWhere(['like', 'MSS', $this->search])
            ->orFilterWhere(['like', 'Existing_MSRN', $this->search])
            ->orFilterWhere(['like', 'New_MSRN', $this->search])
            ->orFilterWhere(['like', 'Status', $this->search])
            ->orFilterWhere(['like', 'Reserved_by', $this->search])
            ->orFilterWhere(['like', 'Updated', $this->search]);
         //   ->orFilterWhere(['like', 'Remark', $this->search]);

        return $dataProvider;
    }
}
