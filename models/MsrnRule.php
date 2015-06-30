<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "msrn_rule".
 *
 * @property string $cmn
 * @property string $area
 * @property string $equipment
 * @property string $new_msrn
 * @property string $last_counter
 * @property string $remark
 */
class MsrnRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msrn_rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cmn', 'area', 'equipment', 'new_msrn', 'last_counter'], 'required'],
            [['cmn', 'area', 'equipment', 'remark'], 'string', 'max' => 100],
            [['new_msrn', 'last_counter'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cmn' => 'Cmn',
            'area' => 'Area',
            'equipment' => 'Equipment',
            'new_msrn' => 'New Msrn',
            'last_counter' => 'Last Counter',
            'remark' => 'Remark',
        ];
    }
}
