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
        $filter = (new Filter)->get($id_filter);
        return $this->render('index', compact('filter'));
    }

    public function actionView($id_item)
    {
        $model = $this->findModel($id_item);
        return $this->render('view', compact('model'));
    }

    public function actionCreate($id_filter)
    {
        $filter = (new Filter)->get($id_filter);
        $model = new FilterItem();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $this->saveModel($model, $filter->id, 'create');
        }
        return $this->render('create', compact('model', 'filter'));
    }

    public function actionUpdate($id_item)
    {
        $model = $this->findModel($id_item);
        if ($model->load(Yii::$app->request->post())) {
            $this->saveModel($model, $model->id_filter, 'update');
        }
        return $this->render('update', compact('model'));
    }

    public function actionDelete($id_item)
    {
        $model = $this->findModel($id_item);
        $model->status = FilterItem::STATUS_INACTIVE;
        if ($model->save()) Yii::$app->session->setFlash('success', "Элемент фильтра успешно удален");
        else Yii::$app->session->setFlash('error', "Ошибка при удалении элемента фильтра"); 
        return $this->redirect(['index', 'id_filter' => $model->filter->id]);
    }

    protected function findModel($id)
    {
        $model = FilterItem::findOne(['id' => $id, 'status' => Filter::STATUS_ACTIVE]);
        if ($model === null) throw new NotFoundHttpException('Такого элемента фильтра не существует.');
        return $model;
    }

    protected function saveModel($model, $id_filter, $action)
    {
        if ($model->saveFilterItem((object)Yii::$app->request->post('FilterItem'))) {
            $action_str = ($action == 'update') ? 'отредактирован' : 'создан';
            Yii::$app->session->setFlash('success', "Элемент фильтра успешно {$action_str}");
            return $this->redirect(['view', 'id_item' => $model->id]);
        }
        else {
            $action_str = ($action == 'update') ? 'редактировании' : 'создании';
            Yii::$app->session->setFlash('error', "Ошибка при {$action_str} элемента фильтра"); 
            return $this->redirect(['index', 'id_filter' => $id_filter]);
        }
        
    }
}
