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

class ApprovalController extends Controller
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
				'actions'=>array('view', 'create', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="LCE"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="REGISTERED"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="BPLO"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view', 'admin', 'create', 'update', 'delete'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ADMIN"',
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
	
			
		$issuance = Issuance::model()->findByAttributes(array('approval_id'=>$id));
		
		if(Yii::app()->user->role == 'REGISTERED' && $issuance === null)
			$this->layout = 'column1';
			
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'issuance'=>$issuance,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$this->layout = 'column1';
		$model=new Approval;
		$model->account_holder_id = $id;
		$model->property_index_code = $model->busAcctHolder->business->property_index_num;
		$model->postal_code = $model->busAcctHolder->business->postal_code;
		$model->full_business_name = $model->busAcctHolder->business->name."/".$model->busAcctHolder->business->trade_name;
		$model->approval_status = 'APPROVED';
		$model->sys_entry_date = date('Y-m-d');
		
		$criteriaTemp = new CDbCriteria;
		$criteriaTemp->addCondition('account_holder_id = '.$model->account_holder_id);
		$criteriaTemp->order = 'progress_id DESC';
		$criteriaTemp->limit = 1;
		$progressTemp = Progress::model()->find($criteriaTemp);
		
		$criteriaTemp1 = new CDbCriteria;
		$criteriaTemp1->addCondition('account_holder_id = '.$model->account_holder_id);
		$criteriaTemp1->order = 'account_holder_id DESC';
		$criteriaTemp1->limit = 1;
		$accountHolderTemp = BusAcctHolder::model()->find($criteriaTemp1);
		
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Approval']))
		{
			$model->attributes=$_POST['Approval'];
			
			if($model->save())
			{
				$model->business_reg_num = $model->approval_id;
				$model->save();
				
				$model->makeIssuance();
				$progressTemp->approval = 'COMPLETED';
				$progressTemp->save();
				if($accountHolderTemp->business->status == 'PENDING')
				{
					$accountHolderTemp->business->status = 'APPROVED';
				}
				$accountHolderTemp->business->save();
				$this->redirect(array('view','id'=>$model->approval_id));
			}
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Approval']))
		{
			$model->attributes=$_POST['Approval'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->approval_id));
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
		$model = Approval::model()->findByPk($id);
		$model->busAcctHolder->progress->approval = '';
		$model->busAcctHolder->business->status = 'PENDING';
		$model->issuance->delete();
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
		$dataProvider = new CActiveDataProvider('Approval', array(
        	'criteria' => array(
        	    'condition' => 'account_holder_id=:id',
        	    'params' => array(':id' => $id),
    	)));
    	
    	$acctHolder = BusAcctHolder::model()->findByPk($id);
    	
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'acctHolder'=>$acctHolder,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Approval('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Approval']))
			$model->attributes=$_GET['Approval'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Approval the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Approval::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Approval $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='approval-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
