<?php

namespace app\models;

use Yii;
use yii\base\Model;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Registration extends Model
{
    public $password;
    public $reenterpassword;
    public $username;
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'reenterpassword', 'email'], 'required'],
            [['username', 'password', 'reenterpassword', 'email'], 'string', 'max' => 255],
            ['reenterpassword','compare','compareAttribute'=>'password'],
            [['email'], 'email'],
            ['username','unique','message'=>'This Username has been taken already.'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'reenterpassword' => 'Re-Enter Password',
            'email' => 'Email',
        ];
    }
}
