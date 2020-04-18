<?php

use app\models\Products;
use app\models\Categories;
use app\models\Settings;
use app\models\Banners;
use yii\helpers\Html;
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
            <div class="product-slider-left-side">
                <?php foreach ($productsF as $product) {?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-image"><img src="<?= $product->getImage()?>"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="title"><h2>SomeTitleName</h2></div>
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad adipisci alias
                                            animi aspernatur at blanditiis consequatur eaque error laborum maiores nemo, nobis nulla
                                            omnis, perferendis quia quibusdam, tempore vero?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="right-slider">
            <div class="product-slider-right-side">
                <?php foreach ($productsC as $product) {?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="title"><h2>SomeTitleName</h2></div>
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad adipisci alias
                                        animi aspernatur at blanditiis consequatur eaque error laborum maiores nemo, nobis nulla
                                        omnis, perferendis quia quibusdam, tempore vero?</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-image"><img src="<?= $product->getImage()?>"></div></div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>
