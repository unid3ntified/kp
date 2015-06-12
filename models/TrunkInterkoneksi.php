<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trunk_interkoneksi".
 *
 * @property string $trunk
 * @property string $partner
 * @property string $poi
 * @property string $connection
 * @property string $direction
 * @property string $vendor
 * @property string $mss
 * @property string $mgw
 * @property string $opc
 * @property string $dpc
 * @property integer $e1_capacity
 * @property string $status
 * @property string $log_date
 * @property string $remark
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
            [['trunk', 'partner', 'poi', 'connection', 'direction', 'vendor', 'mss', 'mgw', 'opc', 'dpc', 'e1_capacity', 'status', 'log_date'], 'required'],
            [['partner', 'connection', 'remark'], 'string'],
            [['e1_capacity'], 'integer'],
            [['log_date'], 'safe'],
            [['trunk', 'direction'], 'string', 'max' => 8],
            [['poi'], 'string', 'max' => 64],
            [['vendor', 'mss', 'mgw'], 'string', 'max' => 32],
            [['opc', 'dpc'], 'string', 'max' => 5],
            [['status'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trunk' => 'Trunk',
            'partner' => 'Partner',
            'poi' => 'Poi',
            'connection' => 'Connection',
            'direction' => 'Direction',
            'vendor' => 'Vendor',
            'mss' => 'Mss',
            'mgw' => 'Mgw',
            'opc' => 'Opc',
            'dpc' => 'Dpc',
            'e1_capacity' => 'E1 Capacity',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }
}
