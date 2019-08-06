<?php

namespace app\modules\product\controllers;

use Yii;
use app\modules\product\classes\Product;
use app\modules\product\classes\ProductItemFilter;
use app\modules\product\classes\ProductSearch;
use app\modules\filter\classes\Filter;
use app\modules\filter\classes\FilterItem;
use app\controllers\BaseController;
use app\models\UploadForm;
use app\modules\product\classes\ProductPrice;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        // debug(Yii::$app->request->queryParams);
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
        if ($model->load(Yii::$app->request->post()) && $model->saveProduct((object)Yii::$app->request->post('Product'))) {
            Yii::$app->session->setFlash('success', "Продукт успешно создан");
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->saveProduct((object)Yii::$app->request->post('Product'));
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', compact('model'));
    }


    public function actionDelete($id)
    {
        $product = Product::findOne($id);
        $product->status = Product::STATUS_INACTIVE;
        $product->save(); 
        Yii::$app->session->setFlash('success', "Продукт успешно удален");
        //to do method delete with delete filters;
        return $this->redirect(['index']);
    }

    public function actionFilters($id_prod)
    {
        $product = $this->findModel($id_prod);
        $item = ProductItemFilter::findOne(['id_prod' => $id_prod, 'id_filter' => 2]);
        $fil_item = FilterItem::findOne($item->id_item);
        $prod_filters = ProductItemFilter::find()->select('id_filter')->where(['id_prod' => $id_prod, 'status' => self::STATUS_ACTIVE])->column();
        return $this->render('filters', compact('product', 'prod_filters'));
    }

    public function actionUpdateFilter($id_prod, $id_filter)
    {
        $filter = Filter::findOne($id_filter);
        $product = Product::findOne($id_prod);
        $model = ProductItemFilter::findOne(['id_prod' => $id_prod, 'id_filter' => $id_filter]);
        if (!$model) $model = new ProductItemFilter();
        if ($model->load(Yii::$app->request->post()) && $model->saveItem((object)Yii::$app->request->post('ProductItemFilter'))) {
            Yii::$app->session->setFlash('success', "Элемент фильтра успешно изменен");
            return $this->redirect(['filters', 'id_prod' => $id_prod]);
        }
        return $this->render('update_filter', compact('filter', 'product', 'model'));
    }

    public function actionUpdatePrice($id_prod)
    {
        $product = Product::findOne($id_prod);
        $model = $product->price ? $product->price : new ProductPrice();
        if (!$this->request->isPost) return $this->render('update_price', compact('product', 'model'));
        // debug((object)$this->request->post('ProductPrice'));
        $model->validate()->savePrice((object)$this->request->post('ProductPrice'))->setFlash('success', 'Цена успешно изменена');
        return $this->redirect(['view', 'id' => $id_prod]);
    }

    public function actionUploadImage($id_prod)
    {
        $product = $this->findModel($id_prod);
        $model = new UploadForm();
        if (!Yii::$app->request->isPost) return $this->render('upload_image', compact('product', 'model'));
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
        if ($model->uploadImageProduct($product)) Yii::$app->session->setFlash('success', "Изображение успешно загружено");
        else Yii::$app->session->setFlash('error', "Ошибка пр загрузке изображения");
        return $this->redirect(['view', 'id' => $id_prod]); 
    }

    protected function findModel($id)
    {
        $product = Product::find()->where(['id' => $id, 'status' => Product::STATUS_ACTIVE])->limit(1)->one();
        if ($product === null) throw new NotFoundHttpException('The requested page does not exist.');
        return $product;
    }
}
