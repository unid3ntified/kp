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
 * @property string $second_OPC
 * @property string $third_OPC
 * @property string $fourth_OPC
 * @property string $fifth_OPC
 * @property string $sixth_OPC
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
            [['opc_nat1', 'opc_nat0', 'second_OPC', 'third_OPC', 'fourth_OPC', 'fifth_OPC', 'sixth_OPC', 'INAT0'], 'string', 'max' => 5],
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
            'second_OPC' => 'Second  Opc',
            'third_OPC' => 'Third  Opc',
            'fourth_OPC' => 'Fourth  Opc',
            'fifth_OPC' => 'Fifth  Opc',
            'sixth_OPC' => 'Sixth  Opc',
            'INAT0' => 'Inat0',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }
}
