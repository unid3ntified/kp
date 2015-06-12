<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mip_reference".
 *
 * @property string $name_msc
 * @property string $nri_msc
 * @property string $nri
 * @property string $null_nri
 * @property string $non_broadcastLAI
 * @property string $cnid
 * @property string $cap_value
 * @property string $status
 * @property string $log_date
 * @property string $remark
 */
class MipReference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mip_reference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_msc', 'nri_msc', 'nri', 'null_nri', 'cnid', 'status', 'log_date'], 'required'],
            [['log_date'], 'safe'],
            [['remark'], 'string'],
            [['name_msc', 'nri_msc', 'null_nri', 'non_broadcastLAI', 'cnid', 'cap_value'], 'string', 'max' => 32],
            [['nri'], 'string', 'max' => 6],
            [['status'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name_msc' => 'Name Msc',
            'nri_msc' => 'Nri Msc',
            'nri' => 'Nri',
            'null_nri' => 'Null Nri',
            'non_broadcastLAI' => 'Non Broadcast Lai',
            'cnid' => 'Cnid',
            'cap_value' => 'Cap Value',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }
}
