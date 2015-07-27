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
    public $search;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['search', 'Regional', 'MSS', 'GT', 'new_GT', 'Status', 'Remark'], 'safe'],
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

        $query->orFilterWhere([
            'No' => $this->No,
        ]);

        $query->orFilterWhere(['like', 'Regional', $this->search])
            ->orFilterWhere(['like', 'MSS', $this->search])
            ->orFilterWhere(['like', 'GT', $this->search])
            ->orFilterWhere(['like', 'new_GT', $this->search])
            ->orFilterWhere(['like', 'Status', $this->search]);
          //  ->orFilterWhere(['like', 'Remark', $this->search]);

        return $dataProvider;
    }
}
