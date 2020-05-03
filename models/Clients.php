<?php

namespace app\models;

use http\Client;
use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $address
 * @property string|null $location
 * @property string|null $region
 * @property string|null $post
 * @property string|null $phone
 * @property string|null $email
 * @property int $is_delete
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_delete'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'surname', 'address', 'location', 'region', 'post', 'phone', 'email'], 'string', 'max' => 255],
            [['name', 'surname', 'address', 'location', 'region', 'post', 'phone'], 'required','message'=>'Insert Data'],
            ['email','email'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'address' => 'Address',
            'location' => 'Location',
            'region' => 'Region',
            'post' => 'Post',
            'phone' => 'Phone',
            'email' => 'Email',
            'is_delete' => 'Is Delete',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function create($name_,$surname_,$address_,$location_,$region_,$post_,$phone_,$email_){
        try {
            $model = new Clients();

            $model->name = $name_;
            $model->surname = $surname_;
            $model->address = $address_;
            $model->location = $location_;
            $model->region = $region_;
            $model->post = $post_;
            $model->phone = $phone_;
            $model->email = $email_;

            $model->save(false);
        }
        catch (\Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public static function createNonEmail($name_,$surname_,$address_,$location_,$region_,$post_,$phone_){
        try {
            $model = new Clients();

            $model->name = $name_;
            $model->surname = $surname_;
            $model->address = $address_;
            $model->location = $location_;
            $model->region = $region_;
            $model->post = $post_;
            $model->phone = $phone_;

            $model->save(false);
        }
        catch (\Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}
