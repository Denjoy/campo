<?php

namespace app\models;

use abcms\multilanguage\behaviors\ModelBehavior;
use abcms\multilanguage\Multilanguage;
use Yii;
use yii\base\ErrorException;
use yii\data\Pagination;
use app\models\Categories;

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
 * @property Categories $categories
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

    public function behaviors() {
        return [
            'translate' => [
                'class' => \abcms\multilanguage\behaviors\ModelBehavior::className(),
                'attributes' => [
                    'title',
                    'description:text-area',
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
            [['position', 'price', 'discount', 'percentage', 'category_id', 'is_delete'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'],'string','max'=>255],
            [['description'],'string'],
            [['image'], 'file', 'extensions' => 'jpg,JPG,jpeg,JPEG,png,PNG', 'skipOnEmpty' => true],
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

    public function saveImage($filename){
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel -> deleteCurrentImage($this->image);
    }

    public function beforeDelete() {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function saveCategory($category_id)
    {
        $categories = Categories::findOne($category_id);
        if($categories != null)
        {
            $this->link('categories', $categories);
            return true;
        }
    }

    public function getCategoryName($id)
    {
        try {
            return Categories::findOne($id)->name;
        }
        catch (ErrorException $ex)
        {
            return 'Категорія не вказана.';
        }
    }

    public  static  function  getAll($pageSize, $category_id)
    {
        $query = Products::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount'=>$count, 'pageSize'=>$pageSize]);

        if(!empty($category_id)) {
            $products = $query
                ->where(['category_id' => $category_id])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        } else {
            $products = $query
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        }

        $data['products'] = $products;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function getProducts()
    {
        $settings = Products::find()
            ->andWhere(['is_delete' => '0'])
            ->all();

        $translatedModels = Multilanguage::translateMultiple($settings);

        return $translatedModels;
    }
    public function getProductsByCategory($catid)
    {
        $settings = Products::find()
            ->where('category_id=:category_id', ['category_id'=>$catid])
            ->andWhere(['is_delete' => '0'])
            ->orderBy('created_at '.'asc')
            ->all();

        $translatedModels = Multilanguage::translateMultiple($settings);

        return $translatedModels;
    }
    public function getProductsByCategoryAsArray($catid)
    {
        $data = Products::find()
            ->asArray()
            ->where('category_id=:category_id', ['category_id'=>$catid])
            ->orderBy('created_at '.'asc')
            ->all();

        $translatedModels = Multilanguage::translateMultiple($data);

        return $translatedModels;
    }
    public static function getRecent($orderBy)
    {
        $settings = Products::find()
            ->andWhere(['is_delete' => '0'])
            ->orderBy('created_at '.$orderBy)
            ->all();

        $translatedModels = Multilanguage::translateMultiple($settings);

        return $translatedModels;
    }
}
