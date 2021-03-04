<?php

use app\models\Products;
use app\models\Categories;
use app\models\Settings;
use app\models\Banners;
use borales\extensions\phoneInput\PhoneInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use evgeniyrru\yii2slick\Slick;

/* @var $this yii\web\View */
/* @var $products  \app\models\Products*/
/* @var $productsF  \app\models\Products*/
/* @var $productsC  \app\models\Products*/
/* @var $settings \app\models\Settings*/
/* @var $banners \app\models\Banners*/
/* @var $categories \app\models\Categories*/
/* @var $pagination app\models\Products */
/* @var $contact_model app\models\Clients */



$this->title = 'Fireplace';
?>
<section class="banners" id="welcome">
    <div id="main-slider" class="main-slider">
        <?php foreach ($banners as $item) { ?>
            <span class="banners-img-element">
                <img src="<?= $item->getImage(); ?>">
            </span>
        <?php } ?>
    </div>
</section>
<section class="products" id="products">
    <h1><?= $settings['products']?></h1>
    <div class="container">
        <div class="left-slider">
            <div class="product-slider">
                <?php foreach ($productsF as $product) {?>
                    <div class="container">
                        <div class="row">
                            <div class="сol-xs-12 col-sm-6 col-md-6 col-lg-6 product-image-price">
                                <div class="image-price">
                                    <div class="product-image">
                                        <img src="<?= $product->getImage()?>">
                                    </div>
                                    <div class="price">
                                        <span><?= $product->price?> ₴</span>
                                    </div>
                                </div>
                            </div>
                            <div class="сol-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="image-price-hide">
                                    <div class="product-image">
                                        <img src="<?= $product->getImage()?>">
                                    </div>
                                    <div class="price">
                                        <span><?= $product->price?> ₴</span>
                                    </div>
                                </div>
                                <div class="title title-top"><h2 class="product-title"><?= $product->title?></h2></div>
                                <div class="description description-top">
                                    <p>
                                        <?php
                                        if(Yii::$app->language == 'ua') {
                                                echo substr(strip_tags($product->description), '0', '300');
                                        } elseif(Yii::$app->language == 'ru') {
                                            echo substr(strip_tags($product->description_rus), '0', '300');
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="buttons">
                                    <div class="show-btn-top" id="show-btn" type="button">
                                        <a>
                                            SHOW
                                        </a>
                                    </div>
                                    <div class="buy-btn" type="button" product_title="<?= $product->title?>">
                                        <a href="#contact-us">
                                            BUY
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="right-slider">
            <div class="product-slider">
                <?php foreach ($productsC as $product) {?>
                    <div class="container">
                        <div class="row">
                            <div class="сol-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="title"><h2><?= $product->title?></h2></div>
                                <div class="description">
                                    <p>
                                        <?php
                                        if(Yii::$app->language == 'ua') {
                                            echo substr(strip_tags($product->description), '0', '300');
                                        } elseif(Yii::$app->language == 'ru') {
                                            echo substr(strip_tags($product->description_rus), '0', '300');
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div  class="buy-btn" type="button" product_title="<?= $product->title?>">
                                    <a href="#contact-us">
                                    BUY
                                    </a>
                                </div>
                            </div>
                            <div class="сol-xs-12 col-sm-6 col-md-6 col-lg-6 product-image-price">
                                <div class="image-price">
                                    <div class="price">
                                        <span><?= $product->price?> ₴</span>
                                    </div>
                                    <div class="product-image">
                                        <img src="<?= $product->getImage()?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>
<section class="about-us" id="about-us">
    <h1><?= $settings['about-us']?></h1>
    <p><?= $settings['about-us-description']?></p>
</section>
<section class="why-us" id="why-us">
    <div class="title">
        <h1><?= $settings['why-us']?></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="сol-xs-12 col-md-4">
                <img src="" alt="">
                <h2><?= $settings['why-us-reason-1']?></h2>
                <p><?= $settings['why-us-description-1']?></p>
            </div>
            <div class="сol-xs-12 col-md-4">
                <img src="" alt="">
                <h2><?= $settings['why-us-reason-2']?></h2>
                <p><?= $settings['why-us-description-2']?></p>
            </div>
            <div class="сol-xs-12 col-md-4">
                <img src="" alt="">
                <h2><?= $settings['why-us-reason-3']?></h2>
                <p><?= $settings['why-us-description-3']?></p>
            </div>
        </div>
    </div>
</section>
<section class="order-now" id="order-now">
    <div class="title">
        <h1><?= $settings['order-now']?></h1>
    </div>
    <div class="order-data">
        <?php $form = ActiveForm::begin(['options' => [
            'class' => 'contact-form',
            'id' => "call-form",
            'enableAjaxValidation' => true,
        ]]); ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($contact_model, 'name', ['options' => ['class' => 'center-block contact-form-input']])->textInput(['placeholder'=>$settings['name']])->label($settings['name'] . "<span> * </span>"); ?>
                    <?= $form->field($contact_model, 'surname', ['options' => ['class' => 'center-block contact-form-input']])->textInput(['placeholder'=>$settings['surname']])->label($settings['surname'] . "<span> * </span>"); ?>
                    <?= $form->field($contact_model, 'address', ['options' => ['class' => 'center-block contact-form-input']])->textInput(['placeholder'=>$settings['address']])->label($settings['address'] . "<span> * </span>"); ?>
                    <?= $form->field($contact_model, 'location', ['options' => ['class' => 'center-block contact-form-input']])->textInput(['placeholder'=>$settings['location']])->label($settings['location'] . "<span> * </span>");?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($contact_model, 'region', ['options' => ['class' => 'center-block contact-form-input']])->textInput(['placeholder'=>$settings['region']])->label($settings['region'] . "<span> * </span>"); ?>
                    <?= $form->field($contact_model, 'post', ['options' => ['class' => 'center-block contact-form-input']])->textInput(['placeholder'=>$settings['phone']])->label($settings['post'] . "<span> * </span>"); ?>
                    <?= $form->field($contact_model, 'phone', ['options' => ['class' => 'center-block contact-form-input aa']])->widget(PhoneInput::className(), [
                        'jsOptions' => [
                            'preferredCountries' => ['ua', 'ru'],
                        ]])->label($settings['phone'] . "<span> * </span>"); ?>
                    <?= $form->field($contact_model, 'email', ['options' => ['class' => 'center-block contact-form-input']])->textInput(['placeholder'=>$settings['email']])->label($settings['email']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 product-info">
                    <p><?= $settings['products']?> :</p>
                </div>
                <div class="col-xs-7 col-sm-3 col-md-9 col-lg-9">
                    <a href="#products" class="buy-product clients-product"><?= $settings['choose-product']?></a>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
        <div class="send-btn">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="center-block contact-form want-design send-form" name="contact-button">Відправити</button>
                    </div>
                    <div class="col-12">
                        <span class="text-center form-aftersent" style="display: none; "></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="contact-us" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h2 class="text-center"><?= $settings['contacts']?></h2>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 contact">
                <p class="text-center">Вадим</p>
                <p>+38090??????</p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 contact">
                <p class="text-center">Женя</p>
                <p>+38050??????</p>
            </div>
        </div>
    </div>
</div>
