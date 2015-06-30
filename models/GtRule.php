<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_rule".
 *
 * @property integer $No
 * @property string $STP
 * @property string $Area
 * @property string $Equipment
 * @property string $GT
 * @property string $Last_counter
 * @property string $Remark
 */
class GtRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gt_rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STP', 'Area', 'GT'], 'required'],
            [['STP', 'Area', 'GT', 'Remark'], 'string'],
            [['Equipment'], 'string', 'max' => 100],
            [['Last_counter'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'No' => 'No',
            'STP' => 'Stp',
            'Area' => 'Area',
            'Equipment' => 'Equipment',
            'GT' => 'Gt',
            'Last_counter' => 'Last Counter',
            'Remark' => 'Remark',
        ];
    }
}
