<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "desc_network".
 *
 * @property integer $id
 * @property string $network_element_id
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
            [['network_element_id'], 'required'],
            [['id'], 'integer'],
            [['desc_network'], 'string'],
            [['opc_nat0', 'opc_nat1', 'second_opc', 'third_opc', 'fourth_opc', 'fifth_opc', 'sixth_opc', 'inat0'], 'match', 'pattern' => '/^[\*0-9]{3,5}$/', 'message' => 'Must contain 3 to 5 numeric characters.'],
            [['network_element_id'], 'string', 'max' => 100],
            //[['opc_nat0', 'opc_nat1'], 'unique', 'targetAttribute' => ['opc_nat0', 'opc_nat1'], 'message' => 'The combination of Opc Nat0 and Opc Nat1 has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'network_element_id' => 'Network ID',
            'opc_nat0' => 'OPC NAT0',
            'opc_nat1' => 'OPC NAT1',
            'desc_network' => 'Desc Network',
            'inat0' => 'INAT0',
            'second_opc' => 'Second OPC',
            'third_opc' => 'Third OPC',
            'fourth_opc' => 'Fourth OPC',
            'fifth_opc' => 'Fifth OPC',
            'sixth_opc' => 'Sixth OPC',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNetwork()
    {
        return $this->hasOne(NetworkElement::className(), ['network_element_id' => 'network_element_id']);
    }
}
