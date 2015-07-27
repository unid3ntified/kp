<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NetworkElement;

/**
 * NetworkElementSearch represents the model behind the search form about `app\models\NetworkElement`.
 */
class NetworkElementSearch extends NetworkElement
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search', 'network_element_id', 'gt_address', 'location', 'provinsi', 'vendor', 'gtt', 'status', 'log_date', 'remark'], 'safe'],
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
        $query = NetworkElement::find();

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
            'log_date' => $this->search,
        ]);

        $query->orFilterWhere(['like', 'network_element_id', $this->search])
            ->orFilterWhere(['like', 'gt_address', $this->search])
            ->orFilterWhere(['like', 'location', $this->search])
            ->orFilterWhere(['like', 'provinsi', $this->search])
            ->orFilterWhere(['like', 'vendor', $this->search])
            ->orFilterWhere(['like', 'gtt', $this->search])
            ->orFilterWhere(['like', 'status', $this->search]);
           // ->orFilterWhere(['like', 'remark', $this->search]);

        return $dataProvider;
    }
}
