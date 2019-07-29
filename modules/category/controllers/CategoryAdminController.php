<?php

namespace app\modules\category\controllers;

use Yii;
use app\modules\category\classes\Category;
use app\modules\category\classes\CategorySearch;
use app\modules\category\classes\CategoryFilter;
use app\modules\filter\classes\Filter;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CategoryAdminController extends BaseController
{
    public $layout = '@layouts/admin';

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

    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', compact('model'));
    }

    public function actionCreate()
    {
        $model = new Category();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->saveCategory();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->saveCategory((object)Yii::$app->request->post('Category'));
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', compact('model'));
    }

    public function actionDelete($id_cat)
    {
        $cat = Category::findOne($id_cat);
        $cat->status = self::STATUS_INACTIVE;
        $cat->save();
        return $this->redirect(['index']);
    }

    public function actionFilters($id_cat)
    {
        $cat_filters = CategoryFilter::find()->select('id_filter')->where(['id_cat' => $id_cat, 'status' => self::STATUS_ACTIVE])->column();
        $all_filters = Filter::findAll(['status' => self::STATUS_ACTIVE]);
        $cat = Category::findOne($id_cat);
        return $this->render('filters', compact('cat_filters', 'all_filters', 'cat'));
    }

    public function actionSaveFilters($id_cat)
    {
        if (CategoryFilter::saveFilters((object)$_GET)) Yii::$app->session->setFlash('success', "Филтры успешно добавлены в категорию");
        else Yii::$app->session->setFlash('error', "Ошибка при добавлении фильтров в категорию");
        return $this->redirect(['category-admin/view', 'id' => $id_cat]);
    }

    protected function findModel($id)
    {
        $model = Category::findOne($id);
        if ($model === null) throw new NotFoundHttpException('Такой категории не существует.');
        return $model;
    }
}
