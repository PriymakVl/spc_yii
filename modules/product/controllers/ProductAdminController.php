<?php

namespace app\modules\product\controllers;

use Yii;
use app\modules\product\classes\Product;
use app\modules\product\classes\ProductItemFilter;
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
        $product = $this->findModel($id)->getItemsFilters();
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
        $product->status = Product::STATUS_INACTIVE;
        $prdouct->save(); 
        Yii::$app->session->setFlash('success', "Продукт успешно удален");
        //to do method delete with delete filters;
        return $this->redirect(['index']);
    }

    public function actionFilters($id_prod)
    {
        $product = $this->findModel($id_prod);
        $prod_filters = ProductItemFilter::find()->select('id_filter')->where(['id_prod' => $id_prod, 'status' => self::STATUS_ACTIVE])->column();
        return $this->render('filters', compact('product', 'prod_filters'));
    }

    public function actionUpdateFilter($id_prod, $id_filter)
    {
        $filter = Filter::findOne($id_filter);
        $product = Product::findOne($id_prod);
        $model = new ProductItemFilter();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->saveProduct(Yii::$app->request->post());
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update_filter', compact('filter', 'product', 'model'));
    }

    protected function findModel($id)
    {
        $product = Product::find()->where(['id' => $id, 'status' => Product::STATUS_ACTIVE])->limit(1)->one();
        if ($product === null) throw new NotFoundHttpException('The requested page does not exist.');
        return $product;
    }
}
