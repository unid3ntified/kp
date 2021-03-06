<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "msc".
 *
 * @property string $msc_name
 * @property string $cnid
 * @property string $pool
 * @property string $non_broadcast_lai
 * @property string $null_nri
 * @property string $nri_msc
 * @property string $spc_msc
 * @property integer $cap_value
 * @property string $nb_lai
 * @property integer $msc_index
 * @property string $msc_IP_sigtran1
 * @property string $msc_IP_sigtran2
 * @property integer $mgw_proxyA_flex
 * @property integer $mgw_managerA_circuit
 * @property string $status
 * @property integer $log_date
 * @property string $remark
 *
 * @property NetworkElement $mscName
 * @property RncReference[] $rncReferences
 * @property TrunkInterkoneksi[] $trunkInterkoneksis
 * @property TrunkVoip[] $trunkVoips
 */
class Msc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['msc_name', 'cnid', 'pool', 'spc_msc', 'cap_value', 'mgw_proxyA_flex', 'mgw_managerA_circuit', 'status'], 'required'],
            [['pool', 'remark'], 'string'],
            [['cap_value', 'msc_index'], 'integer'],
            [['mgw_proxyA_flex', 'mgw_managerA_circuit'], 'safe'],
            [['nb_lai', 'null_nri', 'nri_msc', 'spc_msc', 'nb_lai', 'cnid'], 'string', 'max' => 20],
            [['msc_IP_sigtran1', 'msc_IP_sigtran2', 'msc_name', ], 'string', 'max' => 60],
            [['cnid', 'spc_msc', ], 'match', 'pattern' => '/^[\*0-9]{3,6}$/', 'message' => 'Must contain 3 to 6 numeric characters.'],
            [['nb_lai', 'null_nri', 'nri_msc'], 'match', 'pattern' => '/^[\*0-9]{1,99}$/', 'message' => 'Must contain numeric characters.'],
            [['status'], 'string', 'max' => 30],
            [['log_date'], 'safe'],
            [['msc_IP_sigtran1', 'msc_IP_sigtran2'], 'match', 'pattern' => '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}.*/', 'message' => 'Is not a valid IP address'],
            [['cnid'], 'unique', 'targetClass' => 'app\models\Msc'],
            [['msc_name'], 'unique', 'targetClass' => 'app\models\Msc'],
            [['spc_msc'], 'unique', 'targetClass' => 'app\models\Msc'],
            //[['add1', 'add2'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'msc_name' => 'MSC Name',
            'cnid' => 'CNID',
            //'dummy_number' => 'Dummy Number',
            'pool' => 'Pool',
            'non_broadcast_lai' => 'Non Broadcast Lai',
            'null_nri' => 'Null Nri',
            'nri_msc' => 'Nri Msc',
            'spc_msc' => 'Spc Msc',
            'cap_value' => 'Cap Value',
            'nb_lai' => 'Non Broadcast Lai',
            'msc_index' => 'Msc Index',
            'msc_IP_sigtran1' => 'Msc Ip Sigtran #1',
            'msc_IP_sigtran2' => 'Msc Ip Sigtran #2',
            'mgw_proxyA_flex' => 'Mgw Proxy A Flex',
            'mgw_managerA_circuit' => 'Mgw Manager A Circuit',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
            //'add1' => 'Additional Msc Ip Sigtran #1',
            //'add2' => 'Additional Msc Ip Sigtran #2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMscName()
    {
        return $this->hasOne(NetworkElement::className(), ['network_element_id' => 'msc_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRncReferences()
    {
        return $this->hasMany(RncReference::className(), ['msc_name' => 'msc_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrunkInterkoneksis()
    {
        return $this->hasMany(TrunkInterkoneksi::className(), ['dummy_no' => 'dummy_number']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrunkVoips()
    {
        return $this->hasMany(TrunkVoip::className(), ['dummy_no' => 'dummy_number']);
    }
}
