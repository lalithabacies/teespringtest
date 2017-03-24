<?php

namespace app\models;

use Yii;

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
class HashPwd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
	
	public function beforeSave($insert) {
    if(isset($this->password_hash)) {
		echo $this->password_hash;
		//die;
		$this->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
		//echo $this->password_hash;
		//die;		
	}
        
	if(isset($this->auth_key))
		$this->auth_key = Yii::$app->security->generateRandomString();
    return parent::beforeSave($insert);
	}
	/*public static function generatePwdHash($password_hash){

		return $password_hash = Yii::$app->security->generatePasswordHash($password_hash);
		//$model->password_hash=$password_hash;
		//$model->save();
	}*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
	
	
	
}
