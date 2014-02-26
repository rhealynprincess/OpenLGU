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

class IssuanceController extends Controller
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
				'actions'=>array('view', 'issue', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="LCE"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view', 'issue', 'update'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="ADMIN"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view', 'issue'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="REGISTERED"',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view', 'issue'),
				'expression'=>'!$user->isGuest && $user->getState(\'role\')=="BPLO"',
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
		
		
		$model = Issuance::model()->findByPk($id);
		
		$this->render('view',array(
			'model'=>$model,
		));
	}
	
	public function actionIssue($id)
	{
		$model = Issuance::model()->findByPk($id);
		$signature = Yii::app()->baseUrl.'/assets/uploads/signature.jpg';
		
		$pdf = Yii::app()->ePdf->mpdf();
 
        # You can easily override default constructor's params
        $pdf = Yii::app()->ePdf->mpdf('', 'A4-L', '','','','','','','','','L');
 
 		$pdf->writeHTMLfooter=false;
            $pdf->writeHTMLheader=false;
            $pdf->DeflMargin=15;
            $pdf->DefrMargin=15;
            $pdf->tMargin=15;
            $pdf->bMargin=15;

            //$pdf->w=297;   //manually set width
            //$pdf->h=209.8; //manually set height
 	
 		$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/issue.css');
        $pdf->WriteHTML($stylesheet, 1);
 
 		$pdf->myvariable = file_get_contents(Yii::app()->getBaseUrl(true).'/images/signature.jpg');
 
 
        # renderPartial (only 'view' of current controller)
        $pdf->WriteHTML($this->renderPartial('issue', array('model'=>$model, 'signature'=>$signature), true));
 
 
 
 
        # Outputs ready PDF
        $pdf->Output();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$this->layout = 'column1';
		$model=new Issuance;
		$model->approval_id = $id;
		$model->business_reg_num = $model->approval->business_reg_num;
		$model->full_business_name = $model->approval->full_business_name;
		
		
		
		$criteria = new CDbCriteria;
		$criteria->addCondition('payment_holder_id = '.$model->approval->busAcctHolder->paymentHolder->payment_holder_id);
		$criteria->addCondition('or_num IS NOT NULL');
		$criteria->order = 'due_date ASC';
		$criteria->limit = 1;
		$payMode = PayMode::model()->find($criteria);
		
		$model->or_reference = $payMode->paymentDetail->or_num;
		$model->or_reference_date = $payMode->paymentDetail->sys_entry_date;
		
		$model->scheduled_release_date = $model->approval->issue_date;
		$model->sys_entry_date = date('Y-m-d');
		
		echo $model->business_reg_num;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		
		if(isset($_POST['Issuance']))
		{
			$model->attributes=$_POST['Issuance'];
			if($model->save())
			{
				$model->approval->busAcctHolder->business->sendMail('APPROVAL');
				$this->redirect(array('view','id'=>$model->issuance_id));
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

		if(isset($_POST['Issuance']))
		{
			$model->attributes=$_POST['Issuance'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->issuance_id));
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
		$dataProvider=new CActiveDataProvider('Issuance');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Issuance('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Issuance']))
			$model->attributes=$_GET['Issuance'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Issuance the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Issuance::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Issuance $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='issuance-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
}
