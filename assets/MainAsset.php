<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/jquery-ui.min.css',
        'css/all.min.css',
        'css/slick.css',
        'css/slick-theme.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/jquery-ui.min.js',
        'js/jquery.waypoints.min.js',
        'js/scroll-top.js',
        'js/slick.min.js',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
