<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SgsnCapDimensioning;

/**
 * SgsnCapDimensioningSearch represents the model behind the search form about `app\models\SgsnCapDimensioning`.
 */
class SgsnCapDimensioningSearch extends SgsnCapDimensioning
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search', 'node_name', 'site_name', 'technology_type', 'vendor', 'hardware_version', 'software_level', 'cap_max_sau', 'cap_max_pdp', 'cap_used_sau', 'cap_used_pdp'], 'safe'],
            [['cap_used_sau_percent', 'cap_used_pdp_percent', 'cpu_utilisation_percent', 'memory_utilisation_percent'], 'number'],
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
        $query = SgsnCapDimensioning::find();

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
            'cap_used_sau_percent' => $this->search,
            'cap_used_pdp_percent' => $this->search,
            'cpu_utilisation_percent' => $this->search,
            'memory_utilisation_percent' => $this->search,
        ]);

        $query->orFilterWhere(['like', 'node_name', $this->search])
            ->orFilterWhere(['like', 'site_name', $this->search])
            ->orFilterWhere(['like', 'technology_type', $this->search])
            ->orFilterWhere(['like', 'vendor', $this->search])
            ->orFilterWhere(['like', 'hardware_version', $this->search])
            ->orFilterWhere(['like', 'software_level', $this->search])
            ->orFilterWhere(['like', 'cap_max_sau', $this->search])
            ->orFilterWhere(['like', 'cap_max_pdp', $this->search])
            ->orFilterWhere(['like', 'cap_used_sau', $this->search])
            ->orFilterWhere(['like', 'cap_used_pdp', $this->search]);

        return $dataProvider;
    }
}
