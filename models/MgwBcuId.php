<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mgw_bcu_id".
 *
 * @property string $mgw_name
 * @property string $bcu_id
 * @property string $old_mss_connected
 * @property string $new_mss_connected
 * @property string $remark
 *
 * @property BcuId $mgwName
 */
class MgwBcuId extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mgw_bcu_id';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mgw_name', 'bcu_id'], 'required'],
            [['remark'], 'string'],
            [['mgw_name', 'bcu_id', 'old_mss_connected', 'new_mss_connected'], 'string', 'max' => 32],
            [['bcu_id'], 'unique', 'targetClass' => 'app\models\MgwBcuId'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mgw_name' => 'Mgw Name',
            'bcu_id' => 'Bcu ID',
            'old_mss_connected' => 'Old Mss Connected',
            'new_mss_connected' => 'New Mss Connected',
            'remark' => 'Remark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMgwName()
    {
        return $this->hasOne(BcuId::className(), ['mgw_name' => 'mgw_name']);
    }
}
