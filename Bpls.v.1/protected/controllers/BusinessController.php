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

class BusinessController extends Controller
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
				'actions'=>array('admin','delete', 'view', 'create', 'update', 'index', 'renew'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ADMIN"',
			),
			array('allow',
				'actions'=>array('admin', 'view', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="BPLO"',
			),
			array('allow',
				'actions'=>array('view', 'admin'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ASSESSOR"',
			),
			array('allow',
				'actions'=>array('view', 'admin'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="TREASURY"',
			),
			array('allow',
				'actions'=>array('index', 'create', 'view', 'renew'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="REGISTERED"',
			),
			array('allow',
				'actions'=>array('admin', 'view'),
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
		
		
		$model = Business::model()->findByPk($id);
	
				
		$criteria=new CDbCriteria;
		$criteria->addCondition('business_id = '.$id);
		$criteria->order = 'account_holder_id DESC';
		$criteria->limit = 1;
		$acctHolder = BusAcctHolder::model()->find($criteria);		
		
		$forRenew = BusAcctHolder::model()->countByAttributes(array('business_id'=>$id));
		
		
		$this->render('view',array(
			'model'=>$model,
			'acctHolder'=>$acctHolder,
			'forRenew'=>$forRenew,
		));

		
	}
	
	public function actionRenew($id)
	{
		$this->layout = 'column1';
		$model = Business::model()->findByPk($id);
		
		
		$criteria=new CDbCriteria;
		$criteria->addCondition('business_id = '.$id);
		$criteria->order = 'application_date DESC';
		$criteria->limit = 1;
		$acctHolder = BusAcctHolder::model()->find($criteria);	
		
		
		$newDate = strtotime('-3 week', strtotime($acctHolder->approval->next_renewal_date));
		$newDate = date('Y-m-d', $newDate);
		$today = date('Y-m-d');
		if($newDate > $today)
		{
			Yii::app()->user->setFlash('renewal','Too early to renew business');
			
		} else
		{
		
		
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);

			if(isset($_POST['Business']))
			{
				$model->attributes=$_POST['Business'];
				$model->status = 'PENDING';
				if($model->save())
				{
					$model->makeBusAcctHolder();
					
					$this->redirect(array('view','id'=>$model->business_id));
				}
			}
		
		}
		$this->render('renew',array(
			'model'=>$model,
			'newDate' => $newDate,
			'today'=>$today,
		));
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout = 'column1';
		
		
		if(Yii::app()->user->role == 'REGISTERED')
		{
			$model = new Business;
			$userModel = Taxpayer::model()->findByPk(Yii::app()->user->id);
	
			
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);

			if(isset($_POST['Business']))
			{
				$model->attributes=$_POST['Business'];
				$model->user_id = $userModel->user_id;
				$model->full_address = $model->bldg_num." ".$model->bldg_name.", ".$model->unit_num." ".$model->street.", ".$model->subdivision.", ".$model->barangay.", ".$model->postal_code;
				$model->status = 'PENDING';
				$model->sys_entry_date = date('Y-m-d');
				
				$lob = Lob::model()->findByAttributes(array('description'=>$model->lob_desc));
				$model->lob_code = $lob->major_code.$lob->code;
		
							
				if($model->save())
				{
					$model->makeBusAcctHolder();
					$model->sendMail('CREATION');
							$this->redirect(array('index','id'=>$model->user_id));
				}
			}

			$this->render('create',array(
				'model'=>$model,

			));
		}
		elseif(Yii::app()->user->role == 'ADMIN')
		{
			
			$model = new Business;
			$model->setScenario('adminCreate');
		
			
			$this->performAjaxValidation($model);
			
			if(isset($_POST['Business']))
			{
				$model->attributes=$_POST['Business'];
				$model->full_address = $model->bldg_num." ".$model->bldg_name.", ".$model->unit_num." ".$model->street.", ".$model->subdivision.", ".$model->barangay.", ".$model->postal_code;
				$model->status = 'PENDING';
				$model->sys_entry_date = date('Y-m-d');
				
				$lob = Lob::model()->findByAttributes(array('description'=>$model->lob_desc));
				$model->lob_code = $lob->major_code.$lob->code;
				
				if($model->save())
				{	
					$model->makeBusAcctHolder();
					$this->redirect(array('view','id'=>$model->business_id));
					
				}
			}

			
			$this->render('create',array(
				'model'=>$model,


			));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$this->layout = 'column1';
		if(Yii::app()->user->role == 'BPLO')
		{
			$model->setScenario('bploUpdate');
		}
		
		
		$criteria=new CDbCriteria;
		$criteria->addCondition('business_id = '.$id);
		$criteria->order = 'account_holder_id DESC';
		$criteria->limit = 1;
		$acctHolder = BusAcctHolder::model()->find($criteria);	

		
		$criteriaTemp = new CDbCriteria;
		$criteriaTemp->addCondition('account_holder_id = '.$acctHolder->account_holder_id);
		$criteriaTemp->order = 'progress_id DESC';
		$criteriaTemp->limit = 1;
		$progressTemp = Progress::model()->find($criteriaTemp);
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Business']))
		{
			$model->attributes=$_POST['Business'];
			
			$lob = Lob::model()->findByAttributes(array('description'=>$model->lob_desc));
			$model->lob_code = $lob->major_code.$lob->code;
			
			echo "PRINT THIS!";
			if($model->save())
			{
				
				if($model->getScenario() == 'bploUpdate')
				{
					$acctHolder->progress->business_information = 'COMPLETED';
					$acctHolder->progress->save();
					$model->sendMail('BUSINESSINFORMATION');
				}
				$this->redirect(array('view','id'=>$model->business_id));
			}
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
		$model = Business::model()->findByPk($id);
		
		$acctHolder = BusAcctHolder::model()->findAllByAttributes(array('business_id'=>$id));
		
		
		foreach($acctHolder as $trial)
		{
		
			$docModel = Document::model()->findByAttributes(array('account_holder_id'=>$trial->account_holder_id));
		if($docModel !== null)
		{
			unlink(Yii::app()->basePath."/..".$docModel->file_path.$docModel->barangay_clearance);
			unlink(Yii::app()->basePath."/..".$docModel->file_path.$docModel->zoning_clearance);
			unlink(Yii::app()->basePath."/..".$docModel->file_path.$docModel->sanitary_clearance);
			unlink(Yii::app()->basePath."/..".$docModel->file_path.$docModel->occupancy_permit);
			unlink(Yii::app()->basePath."/..".$docModel->file_path.$docModel->fire_safety);
			rmdir(Yii::app()->basePath."/..".$docModel->file_path);
			rmdir(Yii::app()->basePath."/../assets/uploads/documents/".$trial->business_id);
		}
		
	
			$acctDetail = BusAcctDetail::model()->findByAttributes(array('account_holder_id'=>$trial->account_holder_id));
			if($acctDetail !== null)
			$acctDetail->delete();
		
			$paymentHolder = PaymentHolder::model()->findByAttributes(array('account_holder_id'=>$trial->account_holder_id));
			if($paymentHolder !== null)
			{
			$payModeModel = PayMode::model()->findAllByAttributes(array('payment_holder_id'=>$paymentHolder->payment_holder_id));
			
			
				foreach($payModeModel as $index)
				{
					$paymentDetail = PaymentDetail::model()->findByAttributes(array('pay_mode_id'=>$index->pay_mode_id));
					if($paymentDetail !== null)
						$paymentDetail->delete();
					if($index !== null)
					$index->delete();
				}
			

				$paymentHolder->delete();
			}
		
			$approval = Approval::model()->findByAttributes(array('account_holder_id'=>$trial->account_holder_id));

			if($approval !== null)
			{
				
				$issuance = Issuance::model()->findByAttributes(array('approval_id'=>$approval->approval_id));
				if($issuance !== null)
					$issuance->delete();
				$approval->delete();
				
			}
		
		
		
		
			if($docModel !== null)
				$docModel->delete();
		
		
			$progress = Progress::model()->findByAttributes(array('account_holder_id'=>$trial->account_holder_id));
			if($progress !== null)
			$progress->delete();
			
			$trial->delete();
		}	
		
		
		
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($id)
	{
		
		if(Yii::app()->user->role == 'ADMIN')
		{
			$this->layout = 'column1';
		}
		
		
		
		$dataProvider = new CActiveDataProvider('Business', array(
        'criteria' => array(
            'condition' => 'user_id=:id',
            'params' => array(':id' => $id)
	    )));
	    
	   
	    
	  
		$userModel = Taxpayer::model()->findByPk($id);
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'userModel'=>$userModel,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		if(Yii::app()->user->role == 'LCE' || Yii::app()->user->role == 'BPLO' || Yii::app()->user->role == 'ASSESSOR' || Yii::app()->user->role == 'TREASURY')
			$this->layout = 'column1';
		
		$model=new Business('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Business']))
			$model->attributes=$_GET['Business'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Business the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Business::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Business $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='business-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='update-business-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='renew-business-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	

	
}
