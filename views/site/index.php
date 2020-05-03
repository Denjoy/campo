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
    <h1>Products</h1>
    <div class="container">
        <div class="left-slider">
            <div class="product-slider">
                <?php foreach ($productsF as $product) {?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="image-price">
                                    <div class="product-image">
                                        <img src="<?= $product->getImage()?>">
                                    </div>
                                    <div class="price">
                                        <span><?= $product->price?> ₴</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title"><h2 class="product-title"><?= $product->title?></h2></div>
                                <div class="description">
                                    <p>
                                        <?php
                                        if(Yii::$app->language == 'ua') {
                                            echo substr(strip_tags($product->description), '0', '300').'...';
                                        } elseif(Yii::$app->language == 'ru') {
                                            echo substr(strip_tags($product->description_rus), '0', '300').'...';
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="buy-btn" type="button" product_title="<?= $product->title?>">
                                    <a href="#contact-us">
                                    BUY
                                    </a>
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
                            <div class="col-md-6">
                                <div class="title"><h2><?= $product->title?></h2></div>
                                <div class="description">
                                    <p>
                                        <?php
                                        if(Yii::$app->language == 'ua') {
                                            echo substr(strip_tags($product->description), '0', '300').'...';
                                        } elseif(Yii::$app->language == 'ru') {
                                            echo substr(strip_tags($product->description_rus), '0', '300').'...';
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
                            <div class="col-md-6">
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
    <h1>About us</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatur, ducimus earum error esse, facere facilis hic labore laboriosam nihil obcaecati odio quibusdam quos reprehenderit rerum soluta tempora ut, voluptatem?</p>
</section>
<section class="why-us" id="why-us">
    <div class="title">
        <h1>Why you need choose us</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="" alt="">
                <h2>Because 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores culpa cum dolorem doloremque et eum ex non quia, quos, suscipit temporibus velit! Adipisci consequuntur dolores laudantium minima quam quibusdam velit.</p>
            </div>
            <div class="col-md-4">
                <img src="" alt="">
                <h2>Because 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam atque facere fugit inventore magni quibusdam quidem quisquam sequi sunt. Amet autem excepturi, expedita harum magni quae repudiandae voluptate voluptates?</p>
            </div>
            <div class="col-md-4">
                <img src="" alt="">
                <h2>Because 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aperiam architecto cumque, deserunt earum id iste molestiae natus nisi porro possimus praesentium quam quidem reprehenderit saepe sapiente sit suscipit voluptatibus!</p>
            </div>
        </div>
    </div>
</section>
<section class="order-now" id="order-now">
    <div class="title">
        <h1>Order now</h1>
    </div>
    <div class="">
        <?php $form = ActiveForm::begin(['action' => ['/site/bot'], 'options' => ['class' => 'contact-form', 'id' => "call-form"]]); ?>
        <?= $form->field($contact_model, 'name', ['options' => ['class' => 'contact-form-input']])->textInput(['placeholder'=>'Name'])->label('Name,'); ?>
        <?= $form->field($contact_model, 'surname', ['options' => ['class' => 'contact-form-input']])->textInput(['placeholder'=>'Surname'])->label('Surname,'); ?>
        <?= $form->field($contact_model, 'address', ['options' => ['class' => 'contact-form-input']])->textInput(['placeholder'=>'Address'])->label('Address,'); ?>
        <?= $form->field($contact_model, 'location', ['options' => ['class' => 'contact-form-input']])->textInput(['placeholder'=>'Location'])->label('Location,'); ?>
        <?= $form->field($contact_model, 'region', ['options' => ['class' => 'contact-form-input']])->textInput(['placeholder'=>'Region'])->label('Region,'); ?>
        <?= $form->field($contact_model, 'post', ['options' => ['class' => 'contact-form-input']])->textInput(['placeholder'=>'Post'])->label('Post,'); ?>
        <?= $form->field($contact_model, 'phone', ['options' => ['class' => 'contact-form-input']])->textInput(['placeholder'=>'Phone'])->label('Phone,'); ?>
        <?= $form->field($contact_model, 'email', ['options' => ['class' => 'contact-form-input']])->textInput(['placeholder'=>'Email'])->label('Email,'); ?>
    <button type="submit" class="contact-form want-design" name="contact-button">Хочу замір</button>
    <?php ActiveForm::end(); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <p>First name</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="First name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Second name</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="Second Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Adress</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="Adress">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>City / Village</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="City">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Product</p>
                    </div>
                    <div class="col-md-8">
                        <p href="" class="buy-product"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 right-side">
                <div class="row">
                    <div class="col-md-4">
                        <p>Region</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="Region">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Post Index, ZIP</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="ZIP">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Phone</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="Phone">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>E-mail</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="E-mail">
                    </div>
                </div>
            </div>
        </div>
        <div class="send">
            <a>Send</a>
        </div>
    </div>
    <!--        <div class="description">-->
    <!--            <p>Description</p>-->
    <!--            <textarea placeholder="Description"></textarea>-->
    <!--        </div>-->
    </div>
</section>
<div class="contact-us" id="contact-us">
    <h2>Contacts</h2>
    <div class="contact">
        <p>Vadim</p>
        <p>+380903292323</p>
    </div>
    <div class="contact">
        <p>Zhenya</p>
        <p>+380503823123</p>
    </div>
</div>
