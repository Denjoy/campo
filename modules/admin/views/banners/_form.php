<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Banners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

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
