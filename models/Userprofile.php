<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userprofile".
 *
 * @property integer $profileid
 * @property integer $userid
 * @property string $first_name
 * @property string $last_name
 * @property string $city
 */
class Userprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userprofile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'userid', 'first_name', 'last_name', 'city'], 'required'],
            [['profileid', 'userid'], 'integer'],
            [['first_name', 'last_name', 'city'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profileid' => 'Profileid',
            'userid' => 'Userid',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'city' => 'City',
        ];
    }
}
