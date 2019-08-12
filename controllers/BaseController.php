<?php

	namespace app\controllers;
	
	use Yii;
	use yii\web\Controller;
	use app\helpers\Request;
	
class BaseController extends Controller {

	public $get;
	public $post;
	public $request;
	public $session;

	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	public function  init()
	{
		$this->get = new Request($_GET);
		$this->post = new Request($_POST);
		$this->request = Yii::$app->request;
		$this->session = Yii::$app->session;
		$this->session->open();
	}


}