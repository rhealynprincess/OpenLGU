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

class PaymentDetailController extends Controller
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
				'actions'=>array('view', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ADMIN"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create', 'view', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="TREASURY"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="LCE"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
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
		if(Yii::app()->user->role == 'LCE' || Yii::app()->user->role == 'REGISTERED')
			$this->layout = 'column1';
		$model = PaymentDetail::model()->findByPk($id);
		$payMode = PayMode::model()->findByPk($model->pay_mode_id);
		$acctHolder = BusAcctHolder::model()->findByPk($payMode->paymentHolder->busAcctHolder->account_holder_id);
	
		$this->render('view',array(
			'model'=>$model,
			'payMode'=>$payMode,
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
		$model=new PaymentDetail;
		$payMode = PayMode::model()->findByPk($id);
		$acctHolder = BusAcctHolder::model()->findByPk($payMode->paymentHolder->busAcctHolder->account_holder_id);
		
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PaymentDetail']))
		{
			$model->attributes=$_POST['PaymentDetail'];
			$model->pay_mode = $acctHolder->business->pay_mode;
			$model->capital_amount = $acctHolder->business->capital_amount;
			$model->pay_mode_id = $payMode->pay_mode_id;
			
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
			
			$model->or_num = $model->setOrNumber($acctHolder);
			$model->sys_entry_date = date('Y-m-d');
			
			if($model->grand_total < $model->payMode->amount_due)
			{
				if($model->payMode->paymentHolder->busAcctHolder->business->pay_mode == 'Quarterly')
				{
					if($model->payMode->name == 'Quarter 1')
					{
						$temp = PayMode::model()->findByPk($model->payMode->pay_mode_id+1);
						$temp->amount_due = $temp->amount_due + ($model->payMode->amount_due - $model->grand_total);
						$temp->save();
					} elseif($model->payMode->name == 'Quarter 2')
					{
						$temp = PayMode::model()->findByPk($model->payMode->pay_mode_id+1);
						$temp->amount_due = $temp->amount_due + ($model->payMode->amount_due - $model->grand_total);
						$temp->save();
					} elseif($model->payMode->name == 'Quarter 3')
					{
						$temp = PayMode::model()->findByPk($model->payMode->pay_mode_id+1);
						$temp->amount_due = $temp->amount_due + ($model->payMode->amount_due - $model->grand_total);
						$temp->save();
					}
					
				} elseif($model->payMode->paymentHolder->busAcctHolder->business->pay_mode == 'Bi-Annually')
				{
					if($model->payMode->name == 'Bi-Annual 1')
					{
						$temp = PayMode::model()->findByPk($model->payMode->pay_mode_id+1);
						$temp->amount_due = $temp->amount_due + ($model->payMode->amount_due - $model->grand_total);
						$temp->save();
					}
				}
			}
			
			if($model->save())
			{
				$payMode->or_num = $model->or_num;
				$payMode->amount_paid = $model->grand_total;
				if($payMode->save())
				{
					$model->payMode->paymentHolder->busAcctHolder->progress->payment = 'COMPLETED';
					$model->payMode->paymentHolder->busAcctHolder->progress->save();
					$model->payMode->paymentHolder->busAcctHolder->business->sendMail('PAYMENT');
					$this->redirect(array('view','id'=>$model->payment_detail_id));
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'acctHolder' => $acctHolder,
			'payMode'=>$payMode,
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
		$payMode = PayMode::model()->findByPk($model->pay_mode_id);
		$busModel = $model->payMode->paymentHolder->busAcctHolder->business;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PaymentDetail']))
		{
			$model->attributes=$_POST['PaymentDetail'];
			$model->pay_mode = $acctHolder->business->pay_mode;
			$model->capital_amount = $acctHolder->business->capital_amount;
			$model->pay_mode_id = $payMode->pay_mode_id;
			
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
			
			
			if($model->grand_total < $model->payMode->amount_due)
			{
				if($model->payMode->paymentHolder->busAcctHolder->business->pay_mode == 'Quarterly')
				{
					if($model->payMode->name == 'Quarter 1')
					{
						$temp = PayMode::model()->findByPk($model->payMode->pay_mode_id+1);
						$temp->amount_due = $temp->amount_due + ($model->payMode->amount_due - $model->grand_total);
						$temp->save();
					} elseif($model->payMode->name == 'Quarter 2')
					{
						$temp = PayMode::model()->findByPk($model->payMode->pay_mode_id+1);
						$temp->amount_due = $temp->amount_due + ($model->payMode->amount_due - $model->grand_total);
						$temp->save();
					} elseif($model->payMode->name == 'Quarter 3')
					{
						$temp = PayMode::model()->findByPk($model->payMode->pay_mode_id+1);
						$temp->amount_due = $temp->amount_due + ($model->payMode->amount_due - $model->grand_total);
						$temp->save();
					}
					
				} elseif($model->payMode->paymentHolder->busAcctHolder->business->pay_mode == 'Bi-Annually')
				{
					if($model->payMode->name == 'Bi-Annual 1')
					{
						$temp = PayMode::model()->findByPk($model->payMode->pay_mode_id+1);
						$temp->amount_due = $temp->amount_due + ($model->payMode->amount_due - $model->grand_total);
						$temp->save();
					}
				}
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->payment_detail_id));
		}

		$this->render('update',array(
			'model'=>$model,
			'busModel'=>$busModel,
			'payMode'=>$payMode,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = PaymentDetail::model()->findByPk($id);
		$payMode = PayMode::model()->findByPk($model->pay_mode_id);
		$payMode->or_num = NULL;
		$payMode->save();
		
		$approval = Approval::model()->findByAttributes(array('account_holder_id'=>$payMode->paymentHolder->account_holder_id));
		$issuance = Issuance::model()->findByAttributes(array('approval_id'=>$approval->approval_id));
		
		$issuance->delete();
		$approval->delete();
	

		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('payMode/view', 'id'=>$model->pay_mode_id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PaymentDetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PaymentDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PaymentDetail']))
			$model->attributes=$_GET['PaymentDetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PaymentDetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PaymentDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PaymentDetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='payment-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
