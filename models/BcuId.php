<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bcu_id".
 *
 * @property string $name_mgw
 * @property string $pool
 * @property string $vendor
 * @property string $provinsi
 * @property string $location
 * @property string $bcu_id
 * @property string $status
 * @property string $log_date
 * @property string $remark
 */
class BcuId extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcu_id';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_mgw', 'pool', 'vendor', 'provinsi', 'location', 'bcu_id', 'status', 'log_date'], 'required'],
            [['pool', 'location', 'remark'], 'string'],
            [['log_date'], 'date', 'format' => 'yyyy-M-d', 'message' => 'Date format yyyy-MM-dd'],
            [['name_mgw', 'vendor', 'provinsi', 'bcu_id'], 'string', 'max' => 32],
            [['status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name_mgw' => 'Name Mgw',
            'pool' => 'Pool',
            'vendor' => 'Vendor',
            'provinsi' => 'Provinsi',
            'location' => 'Location',
            'bcu_id' => 'Bcu ID',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }
}
