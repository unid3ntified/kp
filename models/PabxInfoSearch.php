<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PabxInfo;

/**
 * PabxInfoSearch represents the model behind the search form about `app\models\PabxInfo`.
 */
class PabxInfoSearch extends PabxInfo
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['search', 'Regional', 'LAC', 'DN', 'Remark'], 'safe'],
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
        $query = PabxInfo::find();

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
            ->orFilterWhere(['like', 'LAC', $this->search])
            ->orFilterWhere(['like', 'DN', $this->search]);
          //  ->orFilterWhere(['like', 'Remark', $this->search]);

        return $dataProvider;
    }
}
