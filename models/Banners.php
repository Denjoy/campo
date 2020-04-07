<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

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
            [['image'], 'file', 'extensions' => 'jpg,JPG,jpeg,JPEG,png,PNG', 'skipOnEmpty' => true],
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
    public static function getBanners()
    {
        $banners = Banners::find()
            ->andWhere(['is_delete' => '0'])
            ->all();

        return $banners;
    }
    public  static  function  getAll($pageSize = 10, $page_id)
    {
        $query = Banners::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount'=>$count, 'pageSize'=>$pageSize]);

        $banners = $query
            ->orderBy(['position' => SORT_ASC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['banners'] = $banners;
        $data['pagination'] = $pagination;

        return $data;
    }
}
