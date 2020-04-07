<?php

namespace app\modules\admin;

use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = '/admin';
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    public function beforeAction($action) {
        $identity = Yii::$app->user->identity;
        if (!Yii::$app->user->isGuest) {
            if ($identity->getAuthType() == 2) {
                return true;
            } else {
                return Yii::$app->getResponse()
                    ->redirect(['site/login']);
            }
        } else {
            return Yii::$app->getResponse()
                ->redirect(['site/login']);
        }
    }
}
