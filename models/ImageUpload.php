<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model{

    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,JPG,jpeg,JPEG,png,PNG', 'skipOnEmpty' => true]
        ];
    }

    public function uploadFile(UploadedFile $file,$currentimage)
    {
        $this->image = $file;
        if ($this->validate())
        {
            $this->deleteCurrentImage($currentimage);
            return $this->saveImage();
        }
    }

    private function getFolder()
    {
        return Yii::getAlias('@web') . 'uploads/';
    }

    private function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    public function deleteCurrentImage($currentimage)
    {
        if ($this->fileExists($currentimage))
        {
            unlink($this->getFolder() . $currentimage);
        }
    }

    public function fileExists($currentImage)
    {
        if (!empty($currentImage) && $currentImage!= null)
        {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function saveImage()
    {
        $filename = $this->generateFilename();

        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }
}