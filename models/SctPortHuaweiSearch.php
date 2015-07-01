<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SctPortHuawei;

/**
 * SctPortHuaweiSearch represents the model behind the search form about `app\models\SctPortHuawei`.
 */
class SctPortHuaweiSearch extends SctPortHuawei
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['search', 'mss_huawei', 'sctp_port', 'last_counter', 'Remark'], 'safe'],
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
        $query = SctPortHuawei::find();

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

        $query->orFilterWhere(['like', 'mss_huawei', $this->search])
            ->orFilterWhere(['like', 'sctp_port', $this->search])
            ->orFilterWhere(['like', 'last_counter', $this->search])
            ->orFilterWhere(['like', 'Remark', $this->search]);

        return $dataProvider;
    }
}
