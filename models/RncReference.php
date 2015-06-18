<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rnc_reference".
 *
 * @property string $rnc_name
 * @property string $msc_name
 * @property string $mgw_name
 * @property string $vendor_rnc
 * @property string $spc_nat0
 * @property string $trunk_name
 * @property string $rnc_location
 * @property string $status
 * @property string $log_date
 * @property string $remark
 *
 * @property Msc $mscName
 * @property NetworkElement $mgwName
 */
class RncReference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rnc_reference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rnc_name', 'msc_name', 'mgw_name', 'vendor_rnc', 'spc_nat0', 'trunk_name', 'rnc_location', 'status'], 'required'],
            [['log_date'], 'safe'],
            [['remark'], 'string'],
            [['rnc_name', 'msc_name', 'mgw_name', 'trunk_name'], 'string', 'max' => 20],
            [['vendor_rnc'], 'string', 'max' => 100],
            [['rnc_location'], 'string', 'max' => 80],
            [['status'], 'string', 'max' => 30],
            [['spc_nat0'], 'match', 'pattern' => '/^[\*0-9]{3,5}$/', 'message' => 'Must contain 3 to 5 numeric characters.'],
            [['rnc_name', 'mgw_name'], 'unique', 'targetAttribute' => ['rnc_name', 'mgw_name'], 'message' => 'The combination of RNC Name and MGW name has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rnc_name' => 'Rnc Name',
            'msc_name' => 'Msc Name',
            'mgw_name' => 'Mgw Name',
            'vendor_rnc' => 'Vendor Rnc',
            'spc_nat0' => 'Spc Nat0',
            'trunk_name' => 'Trunk Name',
            'rnc_location' => 'Rnc Location',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMscName()
    {
        return $this->hasOne(Msc::className(), ['msc_name' => 'msc_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMgwName()
    {
        return $this->hasOne(NetworkElement::className(), ['network_id' => 'mgw_name']);
    }
}
