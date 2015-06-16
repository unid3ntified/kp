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
            [['name_msc', 'trunk_group', 'dummy_number', 'status', 'log_date'], 'required'],
            [['log_date'], 'date', 'format' => 'yyyy-M-d', 'message' => 'Date format yyyy-MM-dd'],
            [['remark'], 'string'],
            [['name_msc'], 'string', 'max' => 32],
            [['trunk_group'], 'string', 'max' => 8, 'min' => 6],
            [['dummy_number'],  'match', 'pattern' => '/^[\*0-9]{11,12}$/', 'message' => 'Must contain 11 to 12 numeric characters'],
            [['status'], 'safe'],
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

    public function getSpcAddress()
    {
        return $this->hasOne(SpcAddress::className(), ['network_element' => 'name_msc']);
    }
}
