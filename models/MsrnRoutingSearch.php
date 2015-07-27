<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MsrnRouting;

/**
 * MsrnRoutingSearch represents the model behind the search form about `app\models\MsrnRouting`.
 */
class MsrnRoutingSearch extends MsrnRouting
{
    public $search;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['search', 'cluster', 'mss', 'first_route', 'second_route', 'remark'], 'safe'],
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
        $query = MsrnRouting::find();

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

        $query->orFilterWhere(['like', 'cluster', $this->search])
            ->orFilterWhere(['like', 'mss', $this->search])
            ->orFilterWhere(['like', 'first_route', $this->search])
            ->orFilterWhere(['like', 'second_route', $this->search]);
          //  ->orFilterWhere(['like', 'remark', $this->search]);

        return $dataProvider;
    }
}
