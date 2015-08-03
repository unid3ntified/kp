<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bsc".
 *
 * @property string $bsc_id
 * @property string $mgw
 * @property string $msc
 * @property string $trunk_name
 * @property string $log_date
 * @property string $remark
 *
 * @property NetworkElement $bsc
 * @property NetworkElement $mgw0
 */
class Bsc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bsc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bsc_id', 'mgw'], 'required'],
            [['log_date'], 'safe'],
            [['remark'], 'string'],
            [['year'], 'integer', 'max' => 2999, 'message' => 'Please enter a valid year.', 'tooBig' => 'Please enter a valid year.'],
            [['year'], 'integer', 'min' => 1900, 'message' => 'Please enter a valid year.', 'tooSmall' => 'Please enter a valid year.'],         
            [['bsc_id', 'mgw', 'msc', 'trunk_name'], 'string', 'max' => 20],
            [['trunk_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bsc_id' => 'BSC ID',
            'mgw' => 'MGW',
            'msc' => 'MSC',
            'trunk_name' => 'Trunk Name',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBsc()
    {
        return $this->hasOne(NetworkElement::className(), ['network_element_id' => 'bsc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMgw0()
    {
        return $this->hasOne(NetworkElement::className(), ['network_element_id' => 'mgw']);
    }
}
