<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userlogin".
 *
 * @property integer $id
 * @property integer $username
 * @property integer $password
 */
class LoginUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $reenterpassword;
    public $password;
   // public $username;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password','reenterpassword'], 'required'],
            [['username', 'password', 'reenterpassword'], 'string'],
            ['reenterpassword','compare','compareAttribute'=>'password'],
          //  [['auth_key','password_hash'],'string'],
            ['username','unique','message'=>'This Username has been taken already.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'reenterpassword' => 'Re-Enter Password',
        ];
    }
}
