<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "network_element".
 *
 * @property string $network_element_id
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
            [['network_element_id', 'location', 'provinsi', 'vendor', 'status'], 'required'],
            [['location', 'remark'], 'string'],
            [['log_date'], 'safe'],
            [['gt_address', 'vendor', 'gtt', 'status'], 'string', 'max' => 20],
            [['network_element_id'], 'string', 'max' => 100],
            [['provinsi'], 'string', 'max' => 40],
            [['gt_address'], 'unique', 'targetClass' => 'app\models\NetworkElement'],
            [['gtt'], 'unique', 'targetClass' => 'app\models\NetworkElement'],
            [['network_element_id'], 'unique', 'targetClass' => 'app\models\NetworkElement'],
            [['gt_address', 'gtt'], 'match', 'pattern' => '/^[\*0-9]{10,13}$/', 'message' => 'Must contain 10 to 13 numeric characters.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'network_element_id' => 'NE ID',
            'gt_address' => 'GT Address',
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
        return $this->hasMany(BcuId::className(), ['mgw_name' => 'network_element_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescNetworks()
    {
        return $this->hasMany(DescNetwork::className(), ['network_id' => 'network__elementid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMsc()
    {
        return $this->hasOne(Msc::className(), ['msc_name' => 'network_element_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMsrn()
    {
        return $this->hasOne(MsrnProposedlist::className(), ['MSS' => 'network_element_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRncReferences()
    {
        return $this->hasMany(RncReference::className(), ['mgw_name' => 'network_element_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrunkVoips()
    {
        return $this->hasMany(TrunkVoip::className(), ['mgw' => 'network_element_id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoi()
    {
        return $this->hasMany(TrunkVoip::className(), ['mgw' => 'network_element_id']);
    }

    /*
        Generic function to list specified Network Element.
        @param $begin: beginning index of string to be matched with substring
        @param $end: ending index of string to be matched with substring
        @param $substr: the substring to be matched
        @param $maxlength: max length of string allowed
        @return $listData: array of all string that match above criteria
    */
    public static function listData($begin, $end, $substr, $maxlength)
    {
        $temp = Yii::$app->db->createCommand('SELECT network_element_id as name FROM network_element')->queryAll();
        $listData = array();
        $i = 0;
        foreach ($temp as $key => $value) 
        {
            if ((substr(strtolower($value['name']),$begin,$end) == $substr) && (strlen($value['name']) <= $maxlength))
            {
                $listData[$i] = $value['name'];
                //array_push($listData, $value['name']);
                $i++;
            }
        }
        sort($listData);
        return $listData;
    }

    public static function listMgw()
    {
        return static::listData(0,2,"mg",20);
    }

    public static function listMsc()
    {
        $listMsc = array_merge(static::listData(0,2,"ms",20),static::listData(0,1,"t",6));
        sort($listMsc);
        return $listMsc;
    }

    public static function listRnc()
    {
        return static::listData(0,2,"rn",20);
    }

    public static function listBsc()
    {
        return static::listData(0,1,"b",6);
    }

    public static function listSgsn()
    {
        return static::listData(0,2,"sg",40);
    }
}
