<?php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();
/*
if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}*/
?>

<?php

class ProgressController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="REGISTERED"',
			),
			array('allow',
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ADMIN"',
			),
			array('allow',
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="BPLO"',
			),
			array('allow',
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ASSESSOR"',
			),	
			array('allow',
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="TREASURY"',
			),	
			array('allow',
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="LCE"',
			),	
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{	
		
			$this->layout = 'column1';
		$model = Progress::model()->findByPk($id);
		
		$this->render('view',array(
			'model'=>$model,

		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Progress;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Progress']))
		{
			$model->attributes=$_POST['Progress'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->progress_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->layout = 'column1';
		$model=$this->loadModel($id);
		$busModel = Business::model()->findByPk($model->business_id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Progress']))
		{
			$model->attributes=$_POST['Progress'];
			if($model->save())
				if(($model->business_information == 'PASSED') && ($model->documents == 'PASSED') && ($model->assessment == 'PASSED') && ($model->payment == 'PASSED') && ($model->approval == 'PASSED'))
				{
					$busModel->status = 'APPROVED';
					$busModel->save();
				}
				$this->redirect(array('view','id'=>$model->progress_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Progress');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Progress('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Progress']))
			$model->attributes=$_GET['Progress'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Progress the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Progress::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Progress $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='progress-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
