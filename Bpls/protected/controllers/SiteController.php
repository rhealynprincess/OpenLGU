<?php
date_default_timezone_set('Asia/Manila');

$script_tz = date_default_timezone_get();
/*
if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}*/
?>

<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			
			// validate user input and redirect to the previous page if valid
			
			if($model->validate() && $model->login())
			{
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionRegister()
	{
		$model = new Taxpayer;
		$adrModel = new Address;
		$crfModel = new ContactReference;
		$emcModel = new EmergencyContact;
		
		$model->setScenario('register');
		
		$this->performAjaxValidation($model);
		$this->performAjaxValidation($adrModel);
		$this->performAjaxValidation($crfModel);
		$this->performAjaxValidation($emcModel);
	
		if(isset($_POST['Taxpayer']) && isset($_POST['Address']) && isset($_POST['ContactReference']) && isset($_POST['EmergencyContact']))
		{
			//Taxpayer
			$model->attributes = $_POST['Taxpayer'];
			$model->role = 'REGISTERED';
			$model->full_name = $model->first_name." ".$model->middle_name." ".$model->last_name;
			if($model->suffix_name !== '')
			{
				$model->full_name = $model->full_name.", ".$model->suffix_name;
			}
			$model->dob_full = $model->dob_year."-".$model->dob_month."-".$model->dob_day;
			$model->sys_entry_date = date('Y-m-d');
			
			//Address
			$adrModel->attributes = $_POST['Address'];
			$adrModel->full_address = $adrModel->unit_num." ".$adrModel->street.", ".$adrModel->subdivision.", ".$adrModel->barangay;
			$adrModel->sys_entry_date = date('Y-m-d');
			
			//Contact Reference
			$crfModel->attributes = $_POST['ContactReference'];
			$crfModel->sys_entry_date = date('Y-m-d');
			
			//Emergency Contact
			$emcModel->attributes = $_POST['EmergencyContact'];
			$emcModel->full_name = $emcModel->first_name." ".$emcModel->middle_name." ".$emcModel->last_name;
			if($emcModel->suffix_name !== '')
			{
				$emcModel->full_name = $emcModel->full_name.", ".$emcModel->suffix_name;
			}
			$emcModel->sys_entry_date = date('Y-m-d');
			
			
			if($model->save())
			{	
			
				$adrModel->user_id = $model->user_id;
				$crfModel->user_id = $model->user_id;
				$emcModel->user_id = $model->user_id;
				
				if($adrModel->save() && $crfModel->save() && $emcModel->save())
				{
					$this->redirect(array('login'));
				}
			}
			
			
			
		}
	
		$this->render('register',
			array(
				'model'=>$model,
				'adrModel'=>$adrModel,
				'crfModel'=>$crfModel,
				'emcModel'=>$emcModel,
		));
	}
	
	protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
