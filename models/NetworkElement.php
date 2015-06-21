<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "network_element".
 *
 * @property string $network_id
 * @property string $sc_address
 * @property string $location
 * @property string $provinsi
 * @property string $vendor
 * @property string $gtt
 * @property string $inat0
 * @property string $status
 * @property string $log_date
 * @property string $remark
 *
 * @property BcuId[] $bcus
 * @property DescNetwork[] $descNetworks
 * @property Msc $msc
 * @property RncReference[] $rncReferences
 * @property TrunkVoip[] $trunkVoips
 */
class NetworkElement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'network_element';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['network_id', 'location', 'provinsi', 'vendor', 'status'], 'required'],
            [['location', 'remark'], 'string'],
            [['log_date'], 'date', 'format' => 'yyyy-M-d'],
            [['network_id', 'sc_address', 'vendor', 'gtt', 'status'], 'string', 'max' => 20],
            [['provinsi'], 'string', 'max' => 40],
            //[['inat0'], 'string', 'max' => 10],
            [['sc_address'], 'unique', 'targetClass' => 'app\models\NetworkElement'],
            [['gtt'], 'unique', 'targetClass' => 'app\models\NetworkElement'],
            [['network_id'], 'unique', 'targetClass' => 'app\models\NetworkElement'],
            [['sc_address', 'gtt'], 'match', 'pattern' => '/^[\*0-9]{10,15}$/', 'message' => 'Must contain 10 to 15 numeric characters.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'network_id' => 'NE ID',
            'sc_address' => 'GT',
            'location' => 'Location',
            'provinsi' => 'Provinsi',
            'vendor' => 'Vendor',
            'gtt' => 'GTT',
            //'inat0' => 'Inat0',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcus()
    {
        return $this->hasMany(BcuId::className(), ['mgw_name' => 'network_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescNetworks()
    {
        return $this->hasMany(DescNetwork::className(), ['network_id' => 'network_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMsc()
    {
        return $this->hasOne(Msc::className(), ['msc_name' => 'network_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRncReferences()
    {
        return $this->hasMany(RncReference::className(), ['mgw_name' => 'network_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrunkVoips()
    {
        return $this->hasMany(TrunkVoip::className(), ['mgw_name' => 'network_id']);
    }
}