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

class ContactReferenceController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'view', 'create', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ADMIN"',
			),
			array('allow',
				'actions'=>array('view', 'update', 'create', 'delete'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="REGISTERED"',
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
		$model = Taxpayer::model()->findByPk($id);

		$crfModel = new ContactReference('search');
		
		$dataProvider = $crfModel->getContacts($id);

		
		$this->render('view',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$this->layout = 'column1';
		$model = Taxpayer::model()->findByPk($id);
		$crfModel = new ContactReference;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($crfModel);

		if(isset($_POST['ContactReference']))
		{
			$crfModel->attributes=$_POST['ContactReference'];
			
			$crfModel->user_id = $model->user_id;
			$crfModel->sys_entry_date = date('Y-m-d');
			if($crfModel->save())
				$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('create',array(
			'model'=>$model,
			'crfModel'=>$crfModel,
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
		
		
		$crfModel = ContactReference::model()->findByPk($id);
		$model = Taxpayer::model()->findByAttributes(array('user_id'=>$crfModel->user_id));

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($crfModel);

		if(isset($_POST['ContactReference']))
		{
			$crfModel->attributes=$_POST['ContactReference'];
			if($crfModel->save())
			{
				if(Yii::app()->user->role == 'ADMIN')
					$this->redirect(array('taxpayer/view','id'=>$model->user_id));
				if(Yii::app()->user->role == 'REGISTERED')
					$this->redirect(array('taxpayer/profile','id'=>$model->user_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'crfModel'=>$crfModel,
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
		$dataProvider=new CActiveDataProvider('ContactReference');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ContactReference('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ContactReference']))
			$model->attributes=$_GET['ContactReference'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ContactReference the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ContactReference::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ContactReference $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-reference-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
