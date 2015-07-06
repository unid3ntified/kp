<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_proposedlist".
 *
 * @property integer $No
 * @property string $Regional
 * @property string $MSS
 * @property string $GT
 * @property string $new_GT
 * @property string $Status
 * @property string $Remark
 */
class GtProposedlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gt_proposedlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Regional'], 'required'],
            [['Remark'], 'string'],
            [['Regional', 'Vendor'], 'string', 'max' => 100],
            [['MSS'], 'string', 'max' => 20],
            [['GT', 'new_GT'], 'string', 'max' => 30],
            [['Status'], 'string', 'max' => 50]
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
            'MSS' => 'Mss',
            'GT' => 'Gt',
            'new_GT' => 'New  Gt',
            'Status' => 'Status',
            'Remark' => 'Remark',
        ];
    }
}
