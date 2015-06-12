<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "3g_rnc_reference".
 *
 * @property string $msc_name
 * @property string $mgw_name
 * @property string $rnc_name
 * @property string $vendor_rnc
 * @property string $spc_nat0
 * @property string $trunk_name
 * @property string $rnc_description
 * @property string $rnc_location
 * @property string $provinsi
 * @property string $status
 * @property string $log_date
 * @property string $remark
 */
class RncReference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '3g_rnc_reference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['msc_name', 'mgw_name', 'rnc_name', 'spc_nat0', 'trunk_name', 'rnc_description', 'rnc_location', 'provinsi', 'status', 'log_date'], 'required'],
            [['rnc_description', 'rnc_location', 'remark'], 'string'],
            [['log_date'], 'safe'],
            [['msc_name', 'mgw_name', 'rnc_name', 'vendor_rnc', 'provinsi'], 'string', 'max' => 32],
            [['spc_nat0'], 'string', 'max' => 5],
            [['trunk_name'], 'string', 'max' => 8],
            [['status'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'msc_name' => 'Msc Name',
            'mgw_name' => 'Mgw Name',
            'rnc_name' => 'Rnc Name',
            'vendor_rnc' => 'Vendor Rnc',
            'spc_nat0' => 'Spc Nat0',
            'trunk_name' => 'Trunk Name',
            'rnc_description' => 'Rnc Description',
            'rnc_location' => 'Rnc Location',
            'provinsi' => 'Provinsi',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }
}
