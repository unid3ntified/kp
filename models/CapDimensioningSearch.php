<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CapDimensioning;

/**
 * CapDimensioningSearch represents the model behind the search form about `app\models\CapDimensioning`.
 */
class CapDimensioningSearch extends CapDimensioning
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search', 'node_id', 'region', 'hw_type', 'software_release'], 'safe'],
            [['subs_capacity', 'erlang_capacity', 'bhca_capacity'], 'integer'],
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
        $query = CapDimensioning::find();

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
            'subs_capacity' => $this->search,
            'erlang_capacity' => $this->search,
            'bhca_capacity' => $this->search,
        ]);

        $query->orFilterWhere(['like', 'node_id', $this->search])
            ->orFilterWhere(['like', 'region', $this->search])
            ->orFilterWhere(['like', 'hw_type', $this->search])
            ->orFilterWhere(['like', 'software_release', $this->search]);

        return $dataProvider;
    }
}
