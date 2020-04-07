<?php

namespace app\modules\admin\controllers;

use app\models\Categories;
use app\models\ImageUpload;
use Yii;
use app\models\Products;
use app\models\search\ProductsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();
        $imageUploader = new ImageUpload();

        if ($model->load(Yii::$app->request->post()))
        {
            $file = UploadedFile::getInstance($model, 'image');
            $categories = Yii::$app->request->post('categories');

            if(!empty($file))
            {
                $model->saveImage($imageUploader->uploadFile($file,$model->image));
                return $this->redirect(['view','id'=>$model->id]);
            }else
            {
                $model->save();
                return $this->redirect(['view','id'=>$model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $imageUploader = new ImageUpload();
        $currentImage= $model->image;

        if ($model->load(Yii::$app->request->post()))
        {
            $file = UploadedFile::getInstance($model, 'image');

            if(!empty($file))
            {
                $model->saveImage($imageUploader->uploadFile($file,$currentImage));
                return $this->redirect(['view','id'=>$model->id]);
            }else
            {
                $model->image = $currentImage;
                $model->save();
                return $this->redirect(['view','id'=>$model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionSetImage($id)
    {
        $model = new ImageUpload;

        return $this->render('image', ['model'=> $model]);
    }
    public function actionSetCategory($id)
    {
        $products = $this->findModel($id);
        $selectedCategory = Yii::$app->request->post('category_id', '');

        $categories = ArrayHelper::map(Categories::find()->all(), 'id', 'title');

        if(Yii::$app->request->isPost)
        {
            $categories = Yii::$app->request->post('category');
            if($products->saveCategory($categories))
            {
                return $this->redirect(['view', 'id'=>$products->id]);
            }
        }

        return $this->render('category',[
            'products'=>$products,
            'selectedCategory'=>$selectedCategory,
            'categories'=>$categories
        ]);
    }
}
