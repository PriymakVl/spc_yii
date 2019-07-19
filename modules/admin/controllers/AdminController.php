<?php

namespace app\modules\admin\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\admin\classes\LoginFormAdmin;
use app\modules\admin\models\AdminProduct;


class AdminController extends BaseController
{

	public $layout = '@layouts/admin';

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) return $this->redirect('/admin/login');
        else return $this->redirect('/admin/product');
    }

    public function actionLogin()
    {
        $model = new LoginFormAdmin();
        if ($model->load(Yii::$app->request->post()) && $model->login()) $this->redirect('/admin/product');

        //$model->password = '';
        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/admin/login');
    }
}
