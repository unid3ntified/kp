<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spc_address".
 *
 * @property string $network_element
 * @property string $pool
 * @property string $location
 * @property string $provinsi
 * @property string $vendor
 * @property string $sc_address
 * @property string $gtt
 * @property string $opc_nat1
 * @property string $opc_nat0
 * @property string $2nd_OPC
 * @property string $3rd_OPC
 * @property string $4th_OPC
 * @property string $5th_OPC
 * @property string $6th_OPC
 * @property string $INAT0
 * @property string $status
 * @property string $log_date
 * @property string $remark
 */
class SpcAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spc_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['network_element', 'location', 'provinsi', 'vendor', 'opc_nat1', 'status', 'log_date'], 'required'],
            [['pool', 'location', 'remark'], 'string'],
            [['log_date'], 'safe'],
            [['network_element', 'provinsi', 'vendor'], 'string', 'max' => 32],
            [['sc_address'], 'string', 'max' => 255],
            [['gtt', 'status'], 'string', 'max' => 15],
            [['opc_nat1', 'opc_nat0', '2nd_OPC', '3rd_OPC', '4th_OPC', '5th_OPC', '6th_OPC', 'INAT0'], 'string', 'max' => 5],
            [['opc_nat1'], 'unique'],
            [['sc_address'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'network_element' => 'Network Element',
            'pool' => 'Pool',
            'location' => 'Location',
            'provinsi' => 'Provinsi',
            'vendor' => 'Vendor',
            'sc_address' => 'Sc Address',
            'gtt' => 'Gtt',
            'opc_nat1' => 'Opc Nat1',
            'opc_nat0' => 'Opc Nat0',
            '2nd_OPC' => '2nd  Opc',
            '3rd_OPC' => '3rd  Opc',
            '4th_OPC' => '4th  Opc',
            '5th_OPC' => '5th  Opc',
            '6th_OPC' => '6th  Opc',
            'INAT0' => 'Inat0',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }
}
