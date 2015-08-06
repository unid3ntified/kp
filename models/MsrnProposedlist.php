<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "msrn_proposedlist".
 *
 * @property integer $No
 * @property string $Regional
 * @property string $MSS
 * @property string $Existing_MSRN
 * @property string $New_MSRN
 * @property string $Status
 * @property string $Reserved_by
 * @property string $Updated
 * @property string $Remark
 */
class MsrnProposedlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msrn_proposedlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Regional', 'MSS', 'Existing_MSRN', 'New_MSRN', 'Reserved_by', 'Updated'], 'required'],
            [['Existing_MSRN', 'Remark'], 'string'],
            [['Regional', 'Vendor'], 'string', 'max' => 100],
            [['MSS'], 'string', 'max' => 10],
            [['New_MSRN', 'Updated'], 'string', 'max' => 20],
            [['Status', 'Reserved_by'], 'string', 'max' => 50]
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
            'MSS' => 'MSS',
            'Existing_MSRN' => 'Existing  MSRN',
            'New_MSRN' => 'New  MSRN',
            'Status' => 'Status',
            'Reserved_by' => 'Reserved By',
            'Updated' => 'Updated',
            'Remark' => 'Remark',
        ];
    }
}
