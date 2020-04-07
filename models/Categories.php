<?php

namespace app\models;

use abcms\multilanguage\behaviors\ModelBehavior;
use abcms\multilanguage\Multilanguage;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $name
 * @property int $is_delete
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    public function behaviors() {
        return [
            'translate' => [
                'class' => \abcms\multilanguage\behaviors\ModelBehavior::className(),
                'attributes' => [
                    'name',
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_delete'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'is_delete' => 'Is Delete',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'id']);
    }
    public function getProductsCount()
    {
        return $this->getProducts()->count();
    }
    public function getCategories()
    {
        $categories = Categories::find()
            ->andWhere(['is_delete' => '0'])
            ->indexBy('id')
            ->all();

        return $categories;
    }
    public static function getAll()
    {
        return Categories::find()->all();
    }
    public static function getCategory()
    {
        $settings = Categories::find()
            ->all();

        $translatedModels = Multilanguage::translateMultiple($settings);

        return $translatedModels;
    }
    public static function getCatalogByCategory($id)
    {
        $query = Products::find()->where(['category_id'=>$id]);
        $count = $query->count();
        $pagination = new Products(['totalCount' => $count, 'pageSize'=>1]);

        $catalog = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['catalog'] = $catalog;
        $data['pagination'] = $pagination;

        return $data;
    }
}
