<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trunk_voip".
 *
 * @property string $trunk_id
 * @property string $dummy_no
 * @property string $mgw_name
 * @property string $detaill
 * @property string $direction
 * @property string $konfigurasi
 * @property string $partner
 * @property integer $e1
 * @property string $opc_mss
 * @property string $dpc
 * @property string $voip_gateway
 * @property string $status
 * @property string $log_date
 * @property string $remark
 *
 * @property Msc $dummyNo
 * @property NetworkElement $mgwName
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
            [['trunk_id', 'partner', 'voip_gateway', 'status', 'mss', 'mgw'], 'required'],
            [['detail', 'konfigurasi', 'remark'], 'string'],
            [['e1'], 'integer'],
            [['log_date'], 'safe'],
            [['trunk_id', 'mgw', 'mss', 'direction', 'opc_mss', 'dpc', 'status'], 'string', 'max' => 20],
            [['partner'], 'string', 'max' => 50],
            [['voip_gateway'], 'string', 'max' => 80],
            [['trunk_id'], 'unique', 'targetClass' => 'app\models\TrunkVoip'],
            [['opc_mss', 'dpc'], 'match', 'pattern' => '/^[\*0-9]{3,5}$/', 'message' => 'Must contain 3 to 5 numeric characters.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trunk_id' => 'Trunk ID',
            'mgw' => 'MGW',
            'mss' => 'MSS',
            'detail' => 'Detail',
            'direction' => 'Direction',
            'konfigurasi' => 'Konfigurasi',
            'partner' => 'Partner',
            'e1' => 'E1',
            'opc_mss' => 'OPC MSS',
            'dpc' => 'DPC',
            'voip_gateway' => 'VOIP Gateway',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMgwName()
    {
        return $this->hasOne(NetworkElement::className(), ['network_id' => 'mgw_name']);
    }
}
