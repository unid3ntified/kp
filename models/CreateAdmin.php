<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class CreateAdmin extends Model
{
    public $enableCsrfValidation = false;

    public $username;
    public $email;
    public $password;
	public $repeat_password;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User'],
            ['username', 'string', 'min' => 4, 'max' => 50,],

            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['repeat_password', 'compare', 'compareAttribute'=>'password'],
            ['repeat_password', 'required'], 
        ];
    }

	public function attributeLabels()
    {
        return [
            'username' => 'Username',
			'email' => 'Email',	
        ];
    }
	
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);	
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
