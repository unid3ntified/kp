<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bcu_id".
 *
 * @property string $bcu_id
 * @property string $mgw_name
 * @property string $region
 * @property string $old_mss_connected
 * @property string $new_mss_connected
 * @property string $status
 * @property string $log_date
 * @property string $remark
 *
 * @property NetworkElement $mgwName
 */
class BcuId extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bcu_id';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bcu_id', 'mgw_name', 'region', 'status'], 'required'],
            [['log_date'], 'date', 'format' => 'yyyy-M-d'],
            [['remark'], 'string'],
            [['mgw_name', 'old_mss_connected', 'new_mss_connected'], 'string', 'max' => 20],
            [['region'], 'string', 'max' => 80],
            [['status'], 'string', 'max' => 30],
            [['bcu_id'], 'match', 'pattern' => '/^[\*0-9]{3,5}$/', 'message' => 'Must contain 3 to 5 numeric characters.'],
            [['bcu_id'], 'unique', 'targetClass' => 'app\models\BcuId'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bcu_id' => 'Bcu ID',
            'mgw_name' => 'Mgw Name',
            'region' => 'Region',
            'old_mss_connected' => 'Old Mss Connected',
            'new_mss_connected' => 'New Mss Connected',
            'status' => 'Status',
            'log_date' => 'Log Date',
            'remark' => 'Remark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMgwName()
    {
        return $this->hasOne(NetworkElement::className(), ['network_id' => 'mgw_name']);
    }
}
