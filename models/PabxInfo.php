<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pabx_info".
 *
 * @property integer $No
 * @property string $Regional
 * @property string $LAC
 * @property string $DN
 * @property string $Remark
 */
class PabxInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pabx_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Regional', 'LAC'], 'required'],
            [['Remark'], 'string'],
            [['Regional'], 'string', 'max' => 100],
            [['LAC', 'DN'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'No' => 'No',
            'Regional' => 'Regional',
            'LAC' => 'Lac',
            'DN' => 'Dn',
            'Remark' => 'Remark',
        ];
    }
}
