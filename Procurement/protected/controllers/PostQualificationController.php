<?php

class PostQualificationController extends Controller
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
	public function actionView($id)
	{
	    throw new CHttpException(403, 'You are not authorized to perform this action');
	    	$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
  	        throw new CHttpException(403, 'You are not authorized to perform this action');
	    		$model=new PostQualification;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PostQualification']))
		{
			$model->attributes=$_POST['PostQualification'];
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
		$inv = Invitation::model()->findByPk($id);
		if(Yii::app()->user->checkAccess('bacChair')){
			
		}
		else{
			throw new CHttpException(403, 'You are not authorized to perform this action');
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PostQualification']))
		{
			$model->attributes=$_POST['PostQualification'];
			
			if(isset($_POST['time_start']))
			$model->time_start=$_POST['time_start'];
			else
				$model->time_start='23:59';
				
			if(isset($_POST['time_end']))
			$model->time_end=$_POST['time_end'];
			else
				$model->time_end='23:59';
			
				
			if($model->save())
				$this->redirect(array('invitation/view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'inv'=>$inv,
		));
	}

	public function actionUpdateLCRB($id){
		if(Yii::app()->user->checkAccess('bacChair')){
			
		}
		else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		
		$inv= Invitation::model()->findByPk($id);
		if($inv->classification== 'Consulting Services'){
	
		$bids=new CActiveDataProvider('Bid',array(
				    'criteria'=>array(
				        'condition'=>'invitation_id='.$id,
								'order'=> 'correct_calculated_price desc',
				    	),
				    )
				  );
	}
	else{
		
		$bids=new CActiveDataProvider('Bid',array(
				    'criteria'=>array(
				        'condition'=>'invitation_id='.$id,
								'order'=> 'correct_calculated_price asc',
				    	),
				    )
				  );
	}
		$this->render('updateLCRB',array(
			'bids'=>$bids,
			'inv_id'=>$id,
		));	
	}

	public function actionSetAsLcrb($id,$inv_id){
		$inv = Invitation::model()->findByPk($inv_id);
		$inv->lcb =$id;
		$inv->lcrb =$id;
		$inv->save();
		
		/*
		$bidEval = BidEvaluation::model()->findByPk($inv_id);
		$bidEval->lcb =$id;
		$bidEval->save();
		
		$postQua = PostQualification::model()->findByPk($inv_id);
		$postQua->lcrb =$id;
		$postQua->save();
		*/
	
		$this->redirect(array('invitation/view','id'=>$inv_id));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	    throw new CHttpException(403, 'You are not authorized to perform this action');
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
		throw new CHttpException(403, 'You are not authorized to perform this action');
	    $dataProvider=new CActiveDataProvider('PostQualification');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		throw new CHttpException(403, 'You are not authorized to perform this action');
	    $model=new PostQualification('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PostQualification']))
			$model->attributes=$_GET['PostQualification'];

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
		$model=PostQualification::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-qualification-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
