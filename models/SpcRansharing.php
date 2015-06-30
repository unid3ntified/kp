<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spc_ransharing".
 *
 * @property integer $No
 * @property string $SPC
 */
class SpcRansharing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spc_ransharing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SPC'], 'required'],
            [['SPC'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'No' => 'No',
            'SPC' => 'Spc',
        ];
    }
}
