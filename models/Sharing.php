<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Sharing extends Model
{
	public $Name;
	public function rules()
	{
		return [
	            [['Name'], 'safe'],
	    ];
	}

	public function behaviors()
	{
	    return [
	        [
	            'class' => 'mdm\upload\UploadBehavior',
	            'attribute' => 'file', // required, use to receive input file
	            'savedAttribute' => 'file_id', // optional, use to link model with saved file.
	            'uploadPath' => '@web/files', // saved directory. default to '@runtime/upload'
	        ],
	    ];
	}
}