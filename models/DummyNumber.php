<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dummy_number".
 *
 * @property string $name_msc
 * @property string $trunk_group
 * @property string $dummy_number
 * @property string $status
 * @property string $log_date
 * @property string $remark
 */
class DummyNumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dummy_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_msc', 'trunk_group', 'dummy_number', 'status', 'log_date', 'remark'], 'required'],
            [['log_date'], 'safe'],
            [['remark'], 'string'],
            [['name_msc'], 'string', 'max' => 32],
            [['trunk_group'], 'string', 'max' => 8],
            [['dummy_number'], 'string', 'max' => 13],
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
            'trunk_group' => 'Trunk Group',
            'dummy_number' => 'Dummy Number',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }
}
