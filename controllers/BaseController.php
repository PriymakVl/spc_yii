<?php

	namespace app\controllers;
	
	use Yii;
	use yii\web\Controller;
	use app\helpers\Request;
	
class BaseController extends Controller {

	public $get;
	public $post;
	public $request;

	public function  init()
	{
		$this->get = new Request($_GET);
		$this->post = new Request($_POST);
		$this->request = Yii::$app->request;
	}


}