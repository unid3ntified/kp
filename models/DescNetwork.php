<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "desc_network".
 *
 * @property integer $id
 * @property string $network_id
 * @property string $opc_nat0
 * @property string $opc_nat1
 * @property string $desc_network
 * @property string $second_opc
 * @property string $third_opc
 * @property string $fourth_opc
 * @property string $fifth_opc
 * @property string $sixth_opc
 *
 * @property NetworkElement $network
 */
class DescNetwork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desc_network';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['network_id'], 'required'],
            [['desc_network'], 'string'],
            [['network_id', 'opc_nat0', 'opc_nat1', 'second_opc', 'third_opc', 'fourth_opc', 'fifth_opc', 'sixth_opc', 'inat0'], 'string', 'max' => 20],
            //[['opc_nat0', 'opc_nat1'], 'unique', 'targetAttribute' => ['opc_nat0', 'opc_nat1'], 'message' => 'The combination of Opc Nat0 and Opc Nat1 has already been taken.']
            [['opc_nat0'], 'unique', 'targetAttribute' => ['opc_nat0']],
            [['opc_nat1'], 'unique', 'targetAttribute' => ['opc_nat1']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'network_id' => 'Network ID',
            'opc_nat0' => 'Opc Nat0',
            'opc_nat1' => 'Opc Nat1',
            'desc_network' => 'Desc Network',
            'inat0' => 'INAT0',
            'second_opc' => 'Second Opc',
            'third_opc' => 'Third Opc',
            'fourth_opc' => 'Fourth Opc',
            'fifth_opc' => 'Fifth Opc',
            'sixth_opc' => 'Sixth Opc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNetwork()
    {
        return $this->hasOne(NetworkElement::className(), ['network_id' => 'network_id']);
    }
}
