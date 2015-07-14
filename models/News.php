<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $news_desc
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }
    public function behaviors()
    {
        return [
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'file_image', // required, use to receive input file
                'savedAttribute' => 'image_id', // optional, use to link model with saved file.
                //'uploadPath' => '@common/upload', // saved directory. default to '@runtime/upload'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'news_desc'], 'required'],
            [['title', 'news_desc'], 'string'],
            [['image_id'], 'safe'],
            [['username'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'news_desc' => 'News Desc',
            'image_id' => 'Image',
            'username' => 'Posted by',
            'timestamp' => 'Time',
        ];
    }
}
