<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int $auth_type
 * @property string $auth_key
 * @property string $username
 * @property string $password
 * @property int $is_delete
 * @property string $created_at
 * @property string $updated_at
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [
                [
                    'auth_type',
                    'is_delete'
                ],
                'integer'
            ],
            [
                [
                    'created_at',
                    'updated_at'
                ],
                'safe'
            ],
            [
                [
                    'auth_key',
                    'username',
                    'password'
                ],
                'string',
                'max' => 255
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id'         => 'ID',
            'auth_type'  => 'Auth Type',
            'auth_key'   => 'Auth Key',
            'username'   => 'Username',
            'password'   => 'Password',
            'is_delete'  => 'Is Delete',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return ActiveRecord|false
     */
    public static function findByUsername($username) {
        $user = Users::find()
            ->where(['username' => $username])
            ->one();

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getId() {
        return $this->id;
    }

    public function getAuthType() {
        return $this->auth_type;
    }

    /**
     * Validates password
     *
     * @param string $raw_password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($raw_password) {
        return Yii::$app->getSecurity()
            ->validatePassword($raw_password, $this->password);
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
