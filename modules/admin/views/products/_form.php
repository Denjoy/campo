<?php

use app\models\Categories;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
/* @var $selectedCategories \app\modules\admin\controllers\ProductsController */
/* @var $categories \app\modules\admin\controllers\ProductsController */

?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'percentage')->textInput() ?>

    <?php
        $categories = Categories::getCategories();
        $listData = \yii\helpers\ArrayHelper::map($categories, 'id', 'name');
        echo $form->field($model, 'category_id')->dropDownList($listData)
    ?>

    <?php
    echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'name' => 'input-uk',
        'language' => 'uk',
        'options' => ['accept' => 'image/*'],
        'pluginOptions'=>[
            'initialPreview'=>[
                $model->image ? $model->getImage() : null,
            ],
            'initialPreviewShowDelete' => false,
            'initialPreviewAsData'=>true,
            'initialCaption'=>$model->image,
            'initialPreviewConfig' => [
                ['caption' => $model->image],
            ],
            'overwriteInitial',
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
