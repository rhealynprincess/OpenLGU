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

class DocumentController extends Controller
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
				'actions'=>array('create', 'update', 'index'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ADMIN"',
			),
			array('allow',
				'actions'=>array('index', 'create'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="REGISTERED"',
			),
			array('allow',
				'actions'=>array('index', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="BPLO"',
			),
			array('allow',
				'actions'=>array('index'),
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
		
		$model = Document::model()->findByAttributes(array('account_holder_id'=>$id));
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$this->layout = 'column1';
		$model=new Document;
		$acctHolder = BusAcctHolder::model()->findByPk($id);
		

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			$model->account_holder_id = $id;
			$fileSavePath = 'assets/uploads/documents/'.$acctHolder->business_id;
			
			if(($model->barangay_clearance && $model->zoning_clearance && $model->sanitary_clearance && $model->occupancy_permit && $model->fire_safety) !== '')
			{
			if(!file_exists ($fileSavePath))
				mkdir($fileSavePath);
			
				$fileInstancePath = $fileSavePath."/".date('Y-m-d').mktime();
				mkdir($fileInstancePath);
		
			
			$barangayTemp=CUploadedFile::getInstance($model, 'barangay_clearance');
			$zoningTemp=CUploadedFile::getInstance($model, 'zoning_clearance');
			$sanitaryTemp=CUploadedFile::getInstance($model, 'sanitary_clearance');
			$occupancyTemp=CUploadedFile::getInstance($model, 'occupancy_permit');
			$fireTemp=CUploadedFile::getInstance($model, 'fire_safety');
			
			
			//barangay clearance

			if($barangayTemp !== null)
			{ // only do if file is really uploaded
                $barangayName = 'barangayClearance'.$acctHolder->business_id.date('Y-m-d').mktime().'.pdf';
                $model->barangay_clearance = $barangayName;
                $model->barangay_status = 'PENDING';
            }
			
			//zoning clearance

			if($zoningTemp !== null)
			{ // only do if file is really uploaded
                $zoningName = 'zoningClearance'.$acctHolder->business_id.date('Y-m-d').mktime().'.pdf';
                $model->zoning_clearance = $zoningName;
                $model->zoning_status = 'PENDING';
            }
			
			//sanitary clearance

			if($sanitaryTemp !== null)
			{ // only do if file is really uploaded
                $sanitaryName = 'sanitaryClearance'.$acctHolder->business_id.date('Y-m-d').mktime().'.pdf';
                $model->sanitary_clearance = $sanitaryName;
                $model->sanitary_status = 'PENDING';
            }
			
			//occupancy permit

			if($occupancyTemp !== null)
			{ // only do if file is really uploaded
                $occupancyName = 'occupancyPermit'.$acctHolder->business_id.date('Y-m-d').mktime().'.pdf';
                $model->occupancy_permit = $occupancyName;
                $model->occupancy_status = 'PENDING';
            }
			
			//fire safety

			if($fireTemp !== null)
			{ // only do if file is really uploaded
                $fireName = 'fireSafety'.$acctHolder->business_id.date('Y-m-d').mktime().'.pdf';
                $model->fire_safety = $fireName;
                $model->fire_safety_status = 'PENDING';	
            }
			
			$model->file_path = '/'.$fileInstancePath.'/';
			$model->sys_entry_date = date('Y-m-d');
			
			
			
			}
						
			
			if($model->save())
            {
            	if($barangayTemp !== null) // validate to save file
                    $barangayTemp->saveAs($fileInstancePath.'/'.$barangayName);
            	if($zoningTemp !== null) // validate to save file
                    $zoningTemp->saveAs($fileInstancePath.'/'.$zoningName);
            	if($sanitaryTemp !== null) // validate to save file
                    $sanitaryTemp->saveAs($fileInstancePath.'/'.$sanitaryName);
                if($occupancyTemp !== null) // validate to save file
                    $occupancyTemp->saveAs($fileInstancePath.'/'.$occupancyName);
                if($fireTemp !== null) // validate to save file
                    $fireTemp->saveAs($fileInstancePath.'/'.$fireName);   
                    
	                $this->redirect(array('index', 'id'=>$model->account_holder_id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
			'acctHolder' => $acctHolder,
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
		$acctHolder = BusAcctHolder::model()->findByPk($model->account_holder_id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			if($model->save())
			{
				if($model->barangay_status == 'APPROVED' && $model->zoning_status == 'APPROVED' && $model->sanitary_status == 'APPROVED' && $model->occupancy_status == 'APPROVED' && $model->fire_safety_status == 'APPROVED')
				{
					$model->busAcctHolder->progress->documents = 'COMPLETED';
					$model->busAcctHolder->progress->save();
					
					$model->busAcctHolder->business->sendMail('DOCUMENT');
				}
				$this->redirect(array('index','id'=>$model->account_holder_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'acctHolder'=>$acctHolder,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	
		$model = Document::model()->findByPk($id);
		$account_holder_id = $model->account_holder_id;
		
		unlink(Yii::app()->basePath."/..".$model->file_path.$model->barangay_clearance);
		unlink(Yii::app()->basePath."/..".$model->file_path.$model->zoning_clearance);
		unlink(Yii::app()->basePath."/..".$model->file_path.$model->sanitary_clearance);
		unlink(Yii::app()->basePath."/..".$model->file_path.$model->occupancy_permit);
		unlink(Yii::app()->basePath."/..".$model->file_path.$model->fire_safety);
		rmdir(Yii::app()->basePath."/..".$model->file_path);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
		{
			
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index', 'id'=>$account_holder_id));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($id)
	{
		
		
		$dataProvider = new CActiveDataProvider('Document', array(
        	'criteria' => array(
        	    'condition' => 'account_holder_id=:id',
        	    'params' => array(':id' => $id),
    	)));
    	
    	$acctHolder = BusAcctHolder::model()->findByPk($id);
    	
    	$model = Document::model()->findByAttributes(array('account_holder_id'=>$id));
    	
    	if(!empty($model) && Yii::app()->user->role == 'REGISTERED')
    		$this->layout = 'column1';
    	
    	
    	
    	if(Yii::app()->user->role == 'BPLO' && empty($model))
    		
 			$this->layout = 'column1';
 		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'acctHolder' => $acctHolder,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Document('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Document']))
			$model->attributes=$_GET['Document'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Document the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Document::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Document $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='document-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
