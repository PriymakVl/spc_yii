<?php

namespace app\modules\filter\controllers;

use Yii;
use app\modules\filter\classes\Filter;
use app\modules\filter\classes\FilterSearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class FilterAdminController extends BaseController
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
        $searchModel = new FilterSearch();
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
        $model = new Filter();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->saveFilter((object)Yii::$app->request->post('Filter'));
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->saveFilter((object)Yii::$app->request->post('Filter'));
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', compact('model'));
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = Filter::STATUS_INACTIVE;
        $model->save();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        $model = Filter::findOne(['id' => $id, 'status' => Filter::STATUS_ACTIVE]);
        if ($model === null) throw new NotFoundHttpException('Такого фильтра не существует.');
        return $model;
    }
}
