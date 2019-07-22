<?php

namespace app\modules\product\controllers;

use Yii;
use app\modules\product\classes\Product;
use app\modules\product\classes\ProductSearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ProductAdminController extends BaseController
{
	public $layout = '@layouts/admin';
	
    public function behaviors()
    {
        return ['verbs' => ['class' => VerbFilter::className(), 'actions' => ['delete' => ['POST'],],],];
    }

    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionView($id)
    {
        $product = $this->findModel($id);
        // debug($product->category->filters);
        return $this->render('view', ['model' => $product]);
    }

    public function actionCreate()
    {
        $model = new Product();
        if ($model->load(Yii::$app->request->post()) && $model->save()) return $this->redirect(['view', 'id' => $model->id]);
        return $this->render('create', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->saveProduct(Yii::$app->request->post());
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', compact('model'));
    }


    public function actionDelete($id)
    {
        $product = (new Product)->set($id);
        exit('not method');
        // $product->status = Product::STATUS_INACTIVE;
        // $prdouct->save(); 
        //to do method delete with delete filters;
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        $product = Product::find()->where(['id' => $id, 'status' => Product::STATUS_ACTIVE])->limit(1)->one();
        if ($product === null) throw new NotFoundHttpException('The requested page does not exist.');
        $product->getPrice()->getCategory()->getImage();
        $product->category->getFilters();//->getFiltersList()f;
        return $product;
    }
}
