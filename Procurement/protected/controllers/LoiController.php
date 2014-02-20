<?php

class LoiController extends Controller
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
	/*
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	*/
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionViewLois($id)
	{   
		
		if(Yii::app()->user->checkAccess('bacSec')){
			
		}
		else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		
		$bids=new CActiveDataProvider('Loi',array(
				    'criteria'=>array(
				        'condition'=>'invitation_id='.$id,
				    	),
				    )
				  );
		$this->render('viewLois',array(
			'bids'=>$bids,
		));
	}

	public function actionView($id,$inv_id)
	{   
		
		if(Yii::app()->user->checkAccess('privateUser')||Yii::app()->user->checkAccess('bacUser')||Yii::app()->user->checkAccess('admin')){
			
		}
		else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
	
		$this->render('view',array(
			'model'=>$model,
			'inv_id'=>$inv_id,
		));
	}
	
	public function actionSubmit($id){
		if(Yii::app()->user->checkAccess('privateUser')){
		}
		else{
		    throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$error = '';
	
		//check if bid  allready submitted
		$temp = Loi::model()->findByAttributes(array('invitation_id'=>$id,'user_id'=>Yii::app()->user->id));
		//new
		if($temp===null){
			$model = new Loi;
			//set attributes
			$model->invitation_id=$id;
			$model->user_id=Yii::app()->user->id;
		}
		//update
		else{
			$model = $temp;
		}
	
		
		if(isset($_POST['Loi'])){
			$model->invitation_id=$id;
			$model->user_id=Yii::app()->user->id;
			// file e
			if ($_FILES["file"]["error"] > 0)
			  {
			  $error = "Error: loiError";
			  }
			  	
		    if (file_exists("files/loi/" . $_FILES["file"]["name"]))
		      {
		      //echo $_FILES["filee"]["name"] . " already exists. ";
		      $_FILES["file"]["name"] = $_FILES["file"]["name"].CTimestamp::formatDate('Ymdhisa',time()).'l';
		      $error = 'loiFileExists';
		      }
		      	
			      move_uploaded_file($_FILES["file"]["tmp_name"], "files/loi/". $_FILES["file"]["name"]);
			      $model->id = $model->id;
			      $model->file_location = $_FILES["file"]["name"];
			      $model->date_submitted = CTimestamp::formatDate('Y-m-d',time());
				  $model->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			      $model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
				  $model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
				  
		      	if($model->save()){
			      $this->redirect(array('/invitation/view','id'=>$id));
		      	}
		      else{
		      	$error='cannotSaveLoi';
		      }
		}
		 
		
		$model->invitation_id = $id;
		$model->user_id = Yii::app()->user->id;
	
		$this->render('submit',array('model'=>$model,'error'=>$error));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Loi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Loi']))
		{
			$model->attributes=$_POST['Loi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Loi']))
		{
			$model->attributes=$_POST['Loi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Loi');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Loi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Loi']))
			$model->attributes=$_GET['Loi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Loi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='loi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
