<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spc_rule".
 *
 * @property integer $No
 * @property string $Area
 * @property string $SPC
 * @property string $Jenis
 * @property string $Last_counter
 * @property string $Remark
 */
class SpcRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spc_rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Area', 'SPC', 'Jenis', 'Last_counter'], 'required'],
            [['Remark'], 'string'],
            [['Area'], 'string', 'max' => 100],
            [['SPC'], 'string', 'max' => 50],
            [['Jenis'], 'string', 'max' => 20],
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
            'Area' => 'Area',
            'SPC' => 'Spc',
            'Jenis' => 'Jenis',
            'Last_counter' => 'Last Counter',
            'Remark' => 'Remark',
        ];
    }
}
