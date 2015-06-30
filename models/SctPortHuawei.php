<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sct_port_huawei".
 *
 * @property integer $No
 * @property string $mss_huawei
 * @property string $sctp_port
 * @property string $last_counter
 * @property string $Remark
 */
class SctPortHuawei extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sct_port_huawei';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mss_huawei', 'sctp_port'], 'required'],
            [['Remark'], 'string'],
            [['mss_huawei'], 'string', 'max' => 100],
            [['sctp_port', 'last_counter'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'No' => 'No',
            'mss_huawei' => 'Mss Huawei',
            'sctp_port' => 'Sctp Port',
            'last_counter' => 'Last Counter',
            'Remark' => 'Remark',
        ];
    }
}
