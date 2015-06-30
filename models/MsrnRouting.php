<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "msrn_routing".
 *
 * @property integer $No
 * @property string $cluster
 * @property string $mss
 * @property string $first_route
 * @property string $second_route
 * @property string $remark
 */
class MsrnRouting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msrn_routing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cluster', 'mss', 'first_route', 'second_route'], 'required'],
            [['remark'], 'string'],
            [['cluster'], 'string', 'max' => 100],
            [['mss', 'second_route'], 'string', 'max' => 20],
            [['first_route'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'No' => 'No',
            'cluster' => 'Cluster',
            'mss' => 'Mss',
            'first_route' => 'First Route',
            'second_route' => 'Second Route',
            'remark' => 'Remark',
        ];
    }
}
