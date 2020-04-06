<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $position
 * @property string|null $image
 * @property string|null $description
 * @property int|null $price
 * @property int|null $discount
 * @property int|null $percentage
 * @property int|null $category_id
 * @property int $is_delete
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Categories $category
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position', 'price', 'discount', 'percentage', 'category_id', 'is_delete'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'image', 'description'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'position' => 'Position',
            'image' => 'Image',
            'description' => 'Description',
            'price' => 'Price',
            'discount' => 'Discount',
            'percentage' => 'Percentage',
            'category_id' => 'Category ID',
            'is_delete' => 'Is Delete',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
