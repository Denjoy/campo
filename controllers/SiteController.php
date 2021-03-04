<?php

namespace app\controllers;

use app\models\Banners;
use app\models\Categories;
use app\models\Clients;
use app\models\Products;
use app\models\Settings;
use Yii;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $productsF= Products::getProductsByCategory(1);
        $productsC= Products::getProductsByCategory(2);
        $settings = Settings::getSettings();
        $products = Products::getProducts();
        $banners = Banners::getBanners();
        $contact_model = new Clients();
        $categories = Categories::getCategory();

        return $this->render('index',[
            'settings'=>$settings,
            'banners'=>$banners,
            'categories'=>$categories,
            'productsF'=>$productsF,
            'productsC'=>$productsC,
            'products'=>$products,
            'contact_model'=>$contact_model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionBot() {

        $request = Yii::$app->request;

        //is this an ajax request?
        if ($request->isAjax) {

            //what data we need to get from ajax on request
            $phone = $request->post('phone');
            $name = $request->post('name');
            $surname = $request->post('surname');
            $address = $request->post('address');
            $location = $request->post('location');
            $region = $request->post('region');
            $post = $request->post('post');
            $email = $request->post('email');
            $product = $request->post('product');

            $test_chat = '-448380030';
            $prod_chat = '-448380030';

            $result = Yii::$app->telegram->sendMessage([
                'chat_id' => $prod_chat,
                'text'    => "Новий запит на зворотній дзвінок." . "\n Імя: ".$name. "\n Surname: ".$surname. "\n Address: " .$address. "\n Location: " .$location. "\n Post Index: " .$post. "\n Номер: ".$phone. "\n Email: " .$email. "\n Продукт: " .$product
            ]);

            Clients::create($name, $surname, $address, $location, $region, $post, $phone, $email);

        }
        else
        {
            Yii::$app->response->statusCode = 400;
            return 'Error! Request must be Ajax';
        }
    }
}
