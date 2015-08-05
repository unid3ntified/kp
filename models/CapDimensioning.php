<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "msc_cap_dimensioning".
 *
 * @property string $node_id
 * @property string $region
 * @property string $hw_type
 * @property string $software_release
 * @property integer $subs_capacity
 * @property integer $erlang_capacity
 * @property integer $bhca_capacity
 *
 * @property NetworkElement $node
 */
class CapDimensioning extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msc_cap_dimensioning';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_id', 'region', 'hw_type', 'software_release'], 'required'],
            [['subs_capacity', 'erlang_capacity', 'bhca_capacity'], 'integer'],
            [['node_id'], 'string', 'max' => 20],
            [['region'], 'string', 'max' => 50],
            [['hw_type'], 'string', 'max' => 10],
            [['software_release'], 'string', 'max' => 30],
            ['remark', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'node_id' => 'Node ID',
            'region' => 'Region',
            'hw_type' => 'HW Type',
            'software_release' => 'Software Release',
            'subs_capacity' => 'Subs Cap',
            'erlang_capacity' => 'Erlang Cap',
            'bhca_capacity' => 'BHCA Cap',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNode()
    {
        return $this->hasOne(NetworkElement::className(), ['network_element_id' => 'node_id']);
    }
}
