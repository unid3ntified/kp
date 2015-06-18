<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trunk_interkoneksi".
 *
 * @property string $trunk_id
 * @property string $dummy_no
 * @property string $direction
 * @property string $vendor
 * @property string $opc
 * @property string $dpc
 * @property integer $e1_capacity
 * @property string $POI
 * @property string $connection
 * @property string $trunk_group
 * @property string $status
 * @property string $log_date
 * @property string $remark
 *
 * @property Msc $dummyNo
 */
class TrunkInterkoneksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trunk_interkoneksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trunk_id', 'dummy_no', 'direction', 'vendor', 'opc', 'dpc', 'e1_capacity', 'POI', 'connection', 'trunk_group', 'status', 'log_date'], 'required'],
            [['e1_capacity'], 'integer'],
            [['connection', 'remark'], 'string'],
            [['log_date'], 'safe'],
            [['trunk_id', 'dummy_no', 'direction', 'vendor', 'opc', 'dpc'], 'string', 'max' => 20],
            [['POI', 'trunk_group'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trunk_id' => 'Trunk ID',
            'dummy_no' => 'Dummy No',
            'direction' => 'Direction',
            'vendor' => 'Vendor',
            'opc' => 'Opc',
            'dpc' => 'Dpc',
            'e1_capacity' => 'E1 Capacity',
            'POI' => 'Poi',
            'connection' => 'Connection',
            'trunk_group' => 'Trunk Group',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDummyNo()
    {
        return $this->hasOne(Msc::className(), ['dummy_number' => 'dummy_no']);
    }
}
