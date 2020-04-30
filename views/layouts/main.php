<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Products;
use app\widgets\Alert;
use SebastianBergmann\CodeCoverage\Report\PHP;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\MainAsset;

/* @var $banners \app\models\Banners*/
/* @var $products \app\models\Products*/
/* @var $productsC  \app\models\Products*/

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
