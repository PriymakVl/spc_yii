<?php

namespace app\modules\filter\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\filter\classes\Filter;
use app\controllers\BaseController;
use app\modules\filter\classes\FilterItem;

class FilterItemAdminController extends BaseController
{
    public $layout = '@layouts/admin';

    public function actionIndex($id_filter)
    {
        $params = ['id_filter' => $id_filter, 'status' => FilterItem::STATUS_ACTIVE];
        $items = FilterItem::find()->where($params)->orderBy(['rating' => SORT_DESC])->all();
        debug(count($items));
        return $this->render('index', compact('items'));
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
