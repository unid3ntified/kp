<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "poi".
 *
 * @property string $poi
 * @property string $msc_name
 * @property string $address
 * @property string $MSRN
 * @property string $dummy_number
 * @property string $log_date
 * @property string $remark
 *
 * @property NetworkElement $mscName
 */
class Poi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poi', 'msc_name', 'dummy_number'], 'required'],
            [['address', 'remark'], 'string'],
            [['log_date'], 'safe'],
            [['poi'], 'string', 'max' => 50],
            [['msc_name', 'dummy_number'], 'string', 'max' => 20],
            [['MSRN'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'poi' => 'Poi',
            'msc_name' => 'Msc Name',
            'address' => 'Address',
            'MSRN' => 'Msrn',
            'dummy_number' => 'Dummy Number',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMscName()
    {
        return $this->hasOne(NetworkElement::className(), ['network_element_id' => 'msc_name']);
    }
}
