<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trunk_voip".
 *
 * @property string $trunk
 * @property string $partner
 * @property string $voip_gateway
 * @property string $connection
 * @property string $direction
 * @property string $vendor
 * @property string $mss
 * @property string $mgw
 * @property string $ip_partner
 * @property string $ip_xl
 * @property integer $ip_realm
 * @property string $sa_name
 * @property integer $e1_capacity
 * @property string $status
 * @property string $log_date
 * @property string $remark
 */
class TrunkVoip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trunk_voip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trunk', 'partner', 'voip_gateway', 'connection', 'direction', 'vendor', 'mss', 'mgw', 'ip_partner', 'ip_xl', 'ip_realm', 'sa_name', 'e1_capacity', 'status', 'log_date'], 'required'],
            [['partner', 'remark'], 'string'],
            [['ip_realm', 'e1_capacity'], 'integer'],
            [['log_date'], 'date', 'format' => 'yyyy-M-d', 'message' => 'Date format yyyy-MM-dd'],
            [['trunk', 'direction'], 'string', 'max' => 8],
            [['voip_gateway', 'vendor', 'sa_name'], 'string', 'max' => 64],
            [['connection', 'mss', 'mgw'], 'string', 'max' => 32],
            [['ip_partner', 'ip_xl'], 'string', 'max' => 5],
            [['status'], 'safe'],
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
            'voip_gateway' => 'Voip Gateway',
            'connection' => 'Connection',
            'direction' => 'Direction',
            'vendor' => 'Vendor',
            'mss' => 'Mss',
            'mgw' => 'Mgw',
            'ip_partner' => 'Ip Partner',
            'ip_xl' => 'Ip Xl',
            'ip_realm' => 'Ip Realm',
            'sa_name' => 'Sa Name',
            'e1_capacity' => 'E1 Capacity',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }
}
