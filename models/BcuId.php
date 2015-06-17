<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bcu_id".
 *
 * @property string $mgw_name
 * @property string $new_mss_connected
 * @property string $old_mss_connected
 * @property string $region
 * @property string $location
 * @property string $status
 * @property string $log_date
 * @property string $remark
 *
 * @property MgwBcuId $mgwBcu
 * @property RncReference[] $rncReferences
 * @property TrunkVoip[] $trunkVoips
 */
class BcuId extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcu_id';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['mgw_name', 'unique', 'targetClass' => 'app\models\BcuId', 'targetAttribute' => 'mgw_name'],
            [['mgw_name', 'region', 'location'], 'required'],
            [['location', 'remark'], 'string'],
            [['log_date'], 'safe'],
            [['mgw_name'], 'string', 'max' => 32],
            [['region'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 50],          
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mgw_name' => 'Mgw Name',
            'new_mss_connected' => 'New Mss Connected',
            'old_mss_connected' => 'Old Mss Connected',
            'region' => 'Region',
            'location' => 'Location',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMgwBcu()
    {
        return $this->hasOne(MgwBcuId::className(), ['mgw_name' => 'mgw_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRncReferences()
    {
        return $this->hasMany(RncReference::className(), ['mgw_name' => 'mgw_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrunkVoips()
    {
        return $this->hasMany(TrunkVoip::className(), ['mgw_name' => 'mgw_name']);
    }
}
