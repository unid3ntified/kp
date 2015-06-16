<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spc_address".
 *
 * @property string $network_id
 * @property string $desc_network
 * @property string $location
 * @property string $provinsi
 * @property string $vendor
 * @property string $gtt
 * @property string $second_OPC
 * @property string $third_OPC
 * @property string $fourth_OPC
 * @property string $fifth_OPC
 * @property string $sixth_OPC
 * @property string $INAT0
 * @property string $status
 * @property string $log_date
 * @property string $remark
 *
 * @property DummyNumber $dummyNumber
 * @property MipReference[] $mipReferences
 * @property RncReference[] $rncReferences
 * @property SpcAddressDetail[] $spcAddressDetails
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
            [['network_id', 'location', 'vendor', 'status', 'log_date'], 'required'],
            [['location', 'remark'], 'string'],
            [['log_date'], 'safe'],
            [['network_id', 'provinsi', 'vendor'], 'string', 'max' => 32],
            [['gtt'], 'string', 'max' => 15],
            [['second_OPC', 'third_OPC', 'fourth_OPC', 'fifth_OPC', 'sixth_OPC', 'INAT0'], 'string', 'max' => 5],
            [['status'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'network_id' => 'Network ID',
            'location' => 'Location',
            'provinsi' => 'Provinsi',
            'vendor' => 'Vendor',
            'gtt' => 'Gtt',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDummyNumber()
    {
        return $this->hasOne(DummyNumber::className(), ['name_msc' => 'network_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMipReferences()
    {
        return $this->hasMany(MipReference::className(), ['msc_name' => 'network_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRncReferences()
    {
        return $this->hasMany(RncReference::className(), ['msc_name' => 'network_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpcAddressDetails()
    {
        return $this->hasMany(SpcAddressDetail::className(), ['network_id' => 'network_id']);
    }
}
