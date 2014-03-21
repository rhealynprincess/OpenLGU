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

class BusAcctDetailController extends Controller
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
				'actions'=>array('create', 'view', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ADMIN"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index', 'create', 'view', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ASSESSOR"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view', 'index'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="REGISTERED"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="TREASURY"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
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
		if((Yii::app()->user->role == 'REGISTERED') || (Yii::app()->user->role == 'TREASURY'))
		{
			$this->layout = 'column1';
		}
		
		$model = BusAcctDetail::model()->findByPk($id);
		
		$acctHolder = BusAcctHolder::model()->findByPk($model->account_holder_id);		

		
		$this->render('view',array(
			'model'=>$model,
			'acctHolder'=>$acctHolder,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
			$this->layout = 'column1';
			
		$model=new BusAcctDetail;
		$acctHolder = BusAcctHolder::model()->findByPk($id);
	

		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['BusAcctDetail']))
		{
			$model->attributes=$_POST['BusAcctDetail'];
			$model->account_holder_id = $id;
			$model->pay_mode = $acctHolder->business->pay_mode;
			$model->capital_amount = $acctHolder->business->capital_amount;
			
			$model->gross_sales_tax = $model->gross_sales_tax_amt + $model->gross_sales_tax_pnl;
			$model->transport_truck_tax = $model->transport_truck_tax_amt + $model->transport_truck_tax_pnl;
			$model->hazard_storage_tax = $model->hazard_storage_tax_amt + $model->hazard_storage_tax_pnl;
			$model->sign_billboard_tax = $model->sign_billboard_tax_amt + $model->sign_billboard_tax_pnl;
			$model->mayors_permit_fee = $model->mayors_permit_fee_amt + $model->mayors_permit_fee_pnl;
			$model->garbage_fee = $model->garbage_fee_amt + $model->garbage_fee_pnl;
			$model->truck_van_permit_fee = $model->truck_van_permit_fee_amt + $model->truck_van_permit_fee_pnl;
			$model->sanitary_permit_fee = $model->sanitary_permit_fee_amt + $model->sanitary_permit_fee_pnl;
			$model->bldg_insp_fee = $model->bldg_insp_fee_amt + $model->bldg_insp_fee_pnl;
			$model->elec_insp_fee = $model->elec_insp_fee_amt + $model->elec_insp_fee_pnl;
			$model->mech_insp_fee = $model->mech_insp_fee_amt + $model->mech_insp_fee_pnl;
			$model->plumb_insp_fee = $model->plumb_insp_fee_amt + $model->plumb_insp_fee_pnl;
			$model->sign_billboard_fee = $model->sign_billboard_fee_amt + $model->sign_billboard_fee_pnl;
			$model->sign_billboard_renew_fee = $model->sign_billboard_renew_fee_amt + $model->sign_billboard_renew_fee_pnl;
			$model->hazard_storage_fee = $model->hazard_storage_fee_amt + $model->hazard_storage_fee_pnl;
			$model->bfp_fee = $model->bfp_fee_amt + $model->bfp_fee_pnl;
			
			$model->grand_total = $model->gross_sales_tax + $model->transport_truck_tax + $model->hazard_storage_tax + $model->sign_billboard_tax + $model->mayors_permit_fee + $model->garbage_fee + $model->truck_van_permit_fee + $model->sanitary_permit_fee + $model->bldg_insp_fee + $model->elec_insp_fee + $model->mech_insp_fee + $model->plumb_insp_fee + $model->sign_billboard_fee + $model->sign_billboard_renew_fee + $model->hazard_storage_fee + $model->bfp_fee;
			
			$model->sys_entry_date = date('Y-m-d');
			
			
			if($model->save())
			{
				$model->busAcctHolder->progress->assessment = 'COMPLETED';
				$model->busAcctHolder->progress->save();
				$model->busAcctHolder->business->sendMail('ASSESSMENT');
				$this->redirect(array('view','id'=>$model->account_detail_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'id'=>$id,
			'acctHolder'=>$acctHolder,
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
		$holderModel = BusAcctHolder::model()->findByPk($model->account_holder_id);
		$busModel = Business::model()->findByPk($holderModel->business_id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BusAcctDetail']))
		{
			$model->attributes=$_POST['BusAcctDetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->account_detail_id));
		}

		$this->render('update',array(
			'model'=>$model,
			'busModel'=>$busModel,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = BusAcctDetail::model()->findByPk($id);
		$holderModel = BusAcctHolder::model()->findByPk($model->account_holder_id);

		
		
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('busAcctDetail/index', 'id'=>$holderModel->account_holder_id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($id)
	{
		if(Yii::app()->user->role == 'TREASURY' || Yii::app()->user->role == 'REGISTERED')
			$this->layout = 'column1';
		
		$acctHolder = BusAcctHolder::model()->findByPk($id);
		
		$dataProvider = new CActiveDataProvider('BusAcctDetail', array(
        	'criteria' => array(
        	    'condition' => 'account_holder_id=:id',
        	    'params' => array(':id' => $id),
        	    'order'=>'sys_entry_date DESC',
    	)));
    	
    	
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'acctHolder'=> $acctHolder,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BusAcctDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BusAcctDetail']))
			$model->attributes=$_GET['BusAcctDetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BusAcctDetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BusAcctDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BusAcctDetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bus-acct-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		} elseif(isset($_POST['ajax']) && $_POST['ajax']==='update-bus-acct-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
