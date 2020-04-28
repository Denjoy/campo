<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use SebastianBergmann\CodeCoverage\Report\PHP;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\JsExpression;
use yii\widgets\Breadcrumbs;
use app\assets\MainAsset;

/* @var $banners \app\models\Banners*/

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <div class="logo"><img src="images/logo/logo.png"></div>
    <nav>
        <div class="nav" id="Nav">
            <a href="#welcome">Hello</a>
            <a href="#products">Products</a>
            <a href="#about-us">About Us</a>
            <a href="#contact-us">Contact</a>
        </div>
    </nav>
</header>

        <?= $content ?>

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
            <button>Send</button>
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
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Fireplace <?= date('Y') ?></p>
        <span>+380502380308</span>
        <p class="pull-right">Developed by Denjoy</p>
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
