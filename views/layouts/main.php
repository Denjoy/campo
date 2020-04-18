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
            <a href="">Products</a>
            <a href="">About Us</a>
            <a href="">Why you need choose us</a>
            <a href="">Contact</a>
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
            <div class="col-md-3">
                <img src="" alt="">
                <h2>Because 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores culpa cum dolorem doloremque et eum ex non quia, quos, suscipit temporibus velit! Adipisci consequuntur dolores laudantium minima quam quibusdam velit.</p>
            </div>
            <div class="col-md-3">
                <img src="" alt="">
                <h2>Because 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam atque facere fugit inventore magni quibusdam quidem quisquam sequi sunt. Amet autem excepturi, expedita harum magni quae repudiandae voluptate voluptates?</p>
            </div>
            <div class="col-md-3">
                <img src="" alt="">
                <h2>Because 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aperiam architecto cumque, deserunt earum id iste molestiae natus nisi porro possimus praesentium quam quidem reprehenderit saepe sapiente sit suscipit voluptatibus!</p>
            </div>
        </div>
    </div>
</section>
<section class="contact-us" id="contact-us">
    <div class="title">
        <h1></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>First name</p>
                <input type="text" name="First name"></div>
            <div class="col-md-6">
                <p>Second name</p>
                <input type="text" dirname="Second Name"></div>
            <div class="col-md-6">
                <p>E-mail</p>
                <input type="text" value="E-mail"></div>
            <div class="col-md-6">
                <p>Phone</p>
                <input type="text" value="Phone"></div>
            <p>Description</p>
            <input type="text" value="Description"></div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Fireplace <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
