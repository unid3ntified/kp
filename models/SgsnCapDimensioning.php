<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sgsn_cap_dimensioning".
 *
 * @property string $node_name
 * @property string $site_name
 * @property string $technology_type
 * @property string $vendor
 * @property string $hardware_version
 * @property string $software_level
 * @property string $cap_max_sau
 * @property string $cap_max_pdp
 * @property string $cap_used_sau
 * @property string $cap_used_pdp
 * @property double $cap_used_sau_percent
 * @property double $cap_used_pdp_percent
 * @property double $cpu_utilisation_percent
 * @property double $memory_utilisation_percent
 */
class SgsnCapDimensioning extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sgsn_cap_dimensioning';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_name', 'site_name', 'technology_type', 'vendor', 'hardware_version', 'software_level', 'cap_max_sau', 'cap_max_pdp', 'cap_used_sau', 'cap_used_pdp'], 'required'],
            [['cap_used_sau_percent', 'cap_used_pdp_percent', 'cpu_utilisation_percent', 'memory_utilisation_percent'], 'number'],
            [['node_name', 'technology_type'], 'string', 'max' => 20],
            [['site_name'], 'string', 'max' => 100],
            [['vendor'], 'string', 'max' => 30],
            [['hardware_version', 'software_level', 'cap_max_sau', 'cap_max_pdp', 'cap_used_sau', 'cap_used_pdp'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'node_name' => 'Node Name',
            'site_name' => 'Site Name',
            'technology_type' => 'Technology Type',
            'vendor' => 'Vendor',
            'hardware_version' => 'Hardware Version',
            'software_level' => 'Software Level',
            'cap_max_sau' => 'Cap Max Sau',
            'cap_max_pdp' => 'Cap Max Pdp',
            'cap_used_sau' => 'Cap Used Sau',
            'cap_used_pdp' => 'Cap Used Pdp',
            'cap_used_sau_percent' => 'Cap Used Sau Percent',
            'cap_used_pdp_percent' => 'Cap Used Pdp Percent',
            'cpu_utilisation_percent' => 'Cpu Utilisation Percent',
            'memory_utilisation_percent' => 'Memory Utilisation Percent',
        ];
    }
}
