<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property int $id
 * @property int|null $position
 * @property string|null $image
 * @property string|null $link
 * @property int $is_delete
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position', 'is_delete'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'image' => 'Image',
            'link' => 'Link',
            'is_delete' => 'Is Delete',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
