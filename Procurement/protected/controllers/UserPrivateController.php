<?php

class UserPrivateController extends Controller
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
		$options = new OptionRecord();
		$error='';
		if(Yii::app()->user->isGuest||Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You need to log-out to perform this action');
		}
		$model=new UserPrivate;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserPrivate']))
		{
			$model->attributes=$_POST['UserPrivate'];
			
			//check confirm password match
			if($model->password==$_POST['confirmPassword']){
				
        		$ok = true;
				$record=User::model()->findByAttributes(array('username'=>$model->username));
		        if($record!=null){
		        	$ok = false;
		        }
		        $record=UserBac::model()->findByAttributes(array('username'=>$model->username));
		        if($record!=null){
		        	$ok = false;
		        }
		        $record=UserPrivate::model()->findByAttributes(array('username'=>$model->username));
		        if($record!=null){
		        	$ok = false;
		        }
		        if($ok){
					//sex
					if($model->sex=='0')
						$model->sex='Male';
					else
						$model->sex='Female';
					
					//region
					$model->organization_form = $options->getOrganizationFormatIndex($model->organization_form);
					//province
					$model->organization_type = $options->getOrganizationTypeatIndex($model->organization_type);
					//city or municipality
					$model->business_category = $options->getBusinessCategoryatIndex($model->business_category);
					
					//region
					$model->region = $options->getRegionatIndex($model->region);
					//province
					$model->province = $options->getProvinceatIndex($model->province);
					//city or municipality
					$model->city_municipality = $options->getCityorMunicipalityatIndex($model->city_municipality);

					//date and time
					$model->date_created = CTimestamp::formatDate('Y-m-d',time());
					$model->time_created = CTimestamp::formatDate('h:i:s a',time());
					$model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
					$model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
						
				        	
		        	
					$model->password = md5($model->password);
					if($model->save()){
						Yii::app()->authManager->assign('privateUser',$model->id);
						$this->redirect(array('view','id'=>$model->id));
					}
		        }
		        $error = 'usernameExist';
			}
			else{
				$error = 'confirmPassword';
			}
		}
		
		//organization_form
		$model->organization_form = $options->getOrganizationFormIndex($model->organization_form);
		//organization_type
		$model->organization_type = $options->getOrganizationTypeIndex($model->organization_type);
		//business_category
		$model->business_category = $options->getBusinessCategoryIndex($model->business_category);
		
		//region
		$model->region = $options->getRegionIndex($model->region);
		//province
		$model->province = $options->getProvinceIndex($model->province);
		//city or municipality
		$model->city_municipality = $options->getCityorMunicipalityIndex($model->city_municipality);
		
		if($model->sex=='Female')
				$model->sex='1';
			else
				$model->sex='0';
			
		$this->render('create',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$options = new OptionRecord();
		if(Yii::app()->user->id==$id||Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserPrivate']))
		{
			$model->attributes=$_POST['UserPrivate'];
				//sex
				if($model->sex=='0')
					$model->sex='Male';
				else
					$model->sex='Female';
			
				//organization_form
				$model->organization_form = $options->getOrganizationFormatIndex($model->organization_form);
				//organization_type
				$model->organization_type = $options->getOrganizationTypeatIndex($model->organization_type);
				//business_category
				$model->business_category = $options->getBusinessCategoryatIndex($model->business_category);
				
				//region
				$model->region = $options->getRegionatIndex($model->region);
				//province
				$model->province = $options->getProvinceatIndex($model->province);
				//city or municipality
				$model->city_municipality = $options->getCityorMunicipalityatIndex($model->city_municipality);
				//date and time
				$model->date_created = CTimestamp::formatDate('Y-m-d',time());
				$model->time_created = CTimestamp::formatDate('h:i:s a',time());
				$model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
				$model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());

				if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		
		}
		
		
		//organization_form
		$model->organization_form = $options->getOrganizationFormIndex($model->organization_form);
		//organization_type
		$model->organization_type = $options->getOrganizationTypeIndex($model->organization_type);
		//business_category
		$model->business_category = $options->getBusinessCategoryIndex($model->business_category);
		
		//region
		$model->region = $options->getRegionIndex($model->region);
		//province
		$model->province = $options->getProvinceIndex($model->province);
		//city or municipality
		$model->city_municipality = $options->getCityorMunicipalityIndex($model->city_municipality);
		
		if($model->sex=='Female')
				$model->sex='1';
			else
				$model->sex='0';
			
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
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionApprove($id)
	{
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model=$this->loadModel($id);
		$model->account_status='active';
		$model->date_approved = CTimestamp::formatDate('Y-m-d',time());;
		$model->time_approved = CTimestamp::formatDate('h:i:s a',time());;

		if($model->save())
			$this->redirect(array('view','id'=>$model->id));
			
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('UserPrivate',array(
    		'criteria'=>array(
        		'condition'=>"account_status='active'",
				)
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	
	public function actionListRequests()
	{
		
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$dataProvider=new CActiveDataProvider('UserPrivate',array(
    		'criteria'=>array(
        		'condition'=>"account_status='pending'",
				)
		));
		$this->render('listRequests',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model=new UserPrivate('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserPrivate']))
			$model->attributes=$_GET['UserPrivate'];

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
		$model=UserPrivate::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-private-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
