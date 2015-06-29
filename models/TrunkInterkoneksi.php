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
            [['trunk_id', 'direction', 'vendor', 'POI', 'connection', 't_group', 'status'], 'required'],
            [['e1_capacity'], 'integer'],
            [['connection', 'remark'], 'string'],
            [['log_date'], 'safe'],
            [['trunk_id', 'direction', 'vendor', 'opc', 'dpc'], 'string', 'max' => 20],
            [['POI', 't_group'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 30],
            [['trunk_id'], 'unique', 'targetClass' => 'app\models\TrunkInterkoneksi'],
            [['opc', 'dpc'], 'match', 'pattern' => '/^[\*0-9]{3,6}$/', 'message' => 'Must contain 3 to 6 numeric characters.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trunk_id' => 'Trunk Name',
            'direction' => 'Direction',
            'vendor' => 'Vendor',
            'opc' => 'OPC',
            'dpc' => 'DPC',
            'e1_capacity' => 'E1 Capacity',
            'POI' => 'POI',
            'connection' => 'Connection',
            't_group' => 'Partner',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }
}
