<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $address
 * @property string $mobileno
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'mobileno'], 'required'],
            [['address'], 'string'],
            [['username', 'password'], 'string', 'max' => 100],
            [['mobileno'], 'string', 'max' => 10],
			[['fathername'], 'string', 'max' => 100],
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
            'password' => 'Password',
            'address' => 'Address',
            'mobileno' => 'Mobile Number',
			'fathername' => 'Father Name',
        ];
    }
}
