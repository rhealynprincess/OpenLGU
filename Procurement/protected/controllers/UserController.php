<?php

class UserController extends Controller
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
		$model = $this->loadModel($id);
		$array = array('model'=> $model);

		if($model->role=='Admin User'){
		}
		else if($model->role=='BAC User'){
			
		}
		else if($model->role=='Government User'){
			//$model2 = UserGov::model()->findByPk($id);
		}
		else if($model->role=='Private User'){
			$model2 = Organization::model()->findByPk($id);
			$model3 = PrivateOrganization::model()->findByPk($id);
			$array = array(
				'model'=> $model,
				'model2'=> $model2,
				'model3'=> $model3,
			);
		}
		$this->render('view',$array);
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if(false)
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$error='error unknown';
		
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			//check confirm password match
			if($model->password==$_POST['confirmPassword']){
				
				//convert sex values to string
				if($model->sex=='0')
					$model->sex='Male';
				else
					$model->sex='Female';
				
				$model->account_status = 'active';
				$model->date_created = CTimestamp::formatDate('Y-m-d',time());;
				$model->time_created = CTimestamp::formatDate('h:i:s a',time());;
				$model->date_approved = CTimestamp::formatDate('Y-m-d',time());;
				$model->time_approved = CTimestamp::formatDate('h:i:s a',time());;
				
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
		        	
					$model->password = md5($model->password);
					if($model->save()){
						if(isset($_POST['isAdmin'])){
							if($_POST['isAdmin']=='on'){
								Yii::app()->authManager->assign('admin',$model->id);
							}
						}
						$this->redirect(array('view','id'=>$model->id));
					}
		        }
		        $error = 'usernameExist';
			}
			else{
				$error = 'confirmPassword';
			}
		}
		
		if($model->sex=='Female')
				$model->sex='1';
			else
				$model->sex='0';
		
		$this->render('create',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

	public function actionCreatePrivateUser()
	{
		if(Yii::app()->user->checkAccess('guest')||Yii::app()->user->checkAccess('bacSec'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$error='error unknown';
		$options = new OptionRecord;
		$model=new User;
		$model2=new Organization;
		$model3=new PrivateOrganization;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		//initialize variables
		$model->role = 'Private User';
		
		if(isset($_POST['User'])&&isset($_POST['Organization'])&&isset($_POST['PrivateOrganization']))
		{
			$model->attributes=$_POST['User'];
			$model2->attributes=$_POST['Organization'];
			$model3->attributes=$_POST['PrivateOrganization'];
			//check confirm password match
			if($model->password==$_POST['confirmPassword']){
				//check if user already exist
        		$record=User::model()->findByAttributes(array('username'=>$model->username));
		        if($record!=null){
		        }
		        else{
					//set attributes
					$model->date_created = CTimestamp::formatDate('Y-m-d',time());;
					$model->time_created = CTimestamp::formatDate('h:i:s a',time());;
					$model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());;
					$model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());;
					$model->sex = $options->getSexatIndex($model->sex);
					$model->region = $options->getRegionatIndex($model->region);
					$model->province = $options->getProvinceatIndex($model->province);
					$model->city_or_municipality = $options->getCityorMunicipalityatIndex($model->city_or_municipality);
					$model->account_status = 'pending';
					
					//set attributes of organization
					$model2->date_created = CTimestamp::formatDate('Y-m-d',time());;
					$model2->time_created = CTimestamp::formatDate('h:i:s a',time());;
					$model2->date_last_modified = CTimestamp::formatDate('Y-m-d',time());;
					$model2->time_last_modified = CTimestamp::formatDate('h:i:s a',time());;
					
			$model2->region = $options->getRegionatIndex($model2->region);
			$model2->province = $options->getProvinceatIndex($model2->province);
			$model2->city_or_municipality = $options->getCityorMunicipalityatIndex($model2->city_or_municipality);

					$model->password = md5($model->password);
					if($model->save()){
						$model2->id = $model->id;
						if($model2->save()){
							$model3->id = $model->id;
							$model->organization_id = $model->id;
							$model->save();
							if($model3->save()){
								Yii::app()->authManager->assign('privateUser',$model->id);
								$this->redirect(array('view','id'=>$model->id));
							}
						}
					}
					$model->delete();
					$model2->delete();
					$model3->delete();
					
		        }
		        $error = 'usernameExist';
			}
			else{
				$error = 'confirmPassword';
			}
		}
		
		//reset index values
		$model->sex = $options->getSexIndex($model->sex);
		$model->region = $options->getRegionIndex($model->region);
		$model->province = $options->getProvinceIndex($model->province);
		$model->city_or_municipality = $options->getCityorMunicipalityIndex($model->city_or_municipality);
		
		$model->password='';
		$this->render('createPrivateUser',array(
			'model'=>$model,
			'model2'=>$model2,
			'model3'=>$model3,
			'error'=>$error,
		));
	}

	public function actionUpdateEli($id){
		if(Yii::app()->user->checkAccess('privateUser')){
			
		}
		else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$error='';
		if(isset($_POST['User'])){
			$org = Organization::model()->findByPk($id);
		
			if ($_FILES["filee"]["error"] > 0)
			  {
			  $error = "Error: technicalBidError";
			  }
		    if (file_exists("files/eli/" . $_FILES["filee"]["name"]))
		      {
		      //echo $_FILES["filee"]["name"] . " already exists. ";
		      $_FILES["filee"]["name"] = $_FILES["filee"]["name"].CTimestamp::formatDate('Ymdhisa',time()).'eli';
		      $error = 'eliFileExists';
		      }
			$org->eligibility_doc_file_location = $_FILES["filee"]["name"];
			if($org->save()){
				move_uploaded_file($_FILES["filee"]["tmp_name"], "files/eli/". $_FILES["filee"]["name"]);
				$this->redirect(array('view','id'=>$id));	      
			}
		}
		
		$this->render('updateEli',array(
			'model'=>$model,
			'error'=>$error,
		));
	}
	
	public function actionUpdate($id){
		if(Yii::app()->user->checkAccess('admin')){
			
		}
		else{
	    	throw new CHttpException(403, 'You are not authorized to perform this action');
		}
	}
	
	public function actionUpdatePrivate($id)
	{
		$model=User::model()->findByPk($id);
		if(Yii::app()->user->checkAccess('updateSelf',array('User'=>$model))||Yii::app()->user->checkAccess('bacSec'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$error='error unknown';
		$options = new OptionRecord;
		$model2=Organization::model()->findByPk($id);
		$model3=PrivateOrganization::model()->findByPk($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User'])&&isset($_POST['Organization'])&&isset($_POST['PrivateOrganization']))
		{
			$model->attributes=$_POST['User'];
			$model2->attributes=$_POST['Organization'];
			$model3->attributes=$_POST['PrivateOrganization'];
					//set attributes
			$model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());;
			$model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());;
			$model->sex = $options->getSexatIndex($model->sex);
			$model->region = $options->getRegionatIndex($model->region);
			$model->province = $options->getProvinceatIndex($model->province);
			$model->city_or_municipality = $options->getCityorMunicipalityatIndex($model->city_or_municipality);
			$model2->region = $options->getRegionatIndex($model2->region);
			$model2->province = $options->getProvinceatIndex($model2->province);
			$model2->city_or_municipality = $options->getCityorMunicipalityatIndex($model2->city_or_municipality);
			$model3->form = $options->getOrganizationFormatIndex($model3->form);
			$model3->type = $options->getOrganizationTypeatIndex($model3->type);
			$model3->business_category = $options->getBusinessCategoryatIndex($model3->business_category);
			
			//set attributes of organization
			$model2->date_last_modified = CTimestamp::formatDate('Y-m-d',time());;
			$model2->time_last_modified = CTimestamp::formatDate('h:i:s a',time());;
			
			if($model->save()&&$model2->save()&&$model3->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		//reset index values
		$model->sex = $options->getSexIndex($model->sex);
		$model->region = $options->getRegionIndex($model->region);
		$model->province = $options->getProvinceIndex($model->province);
		$model->city_or_municipality = $options->getCityorMunicipalityIndex($model->city_or_municipality);
		$model2->region = $options->getRegionIndex($model2->region);
		$model2->province = $options->getProvinceIndex($model2->province);
		$model2->city_or_municipality = $options->getCityorMunicipalityIndex($model2->city_or_municipality);
		$model3->form = $options->getOrganizationFormIndex($model3->form);
		$model3->type = $options->getOrganizationTypeIndex($model3->type);
		$model3->business_category = $options->getBusinessCategoryIndex($model3->business_category);
		
		$this->render('updatePrivate',array(
			'model'=>$model,
			'model2'=>$model2,
			'model3'=>$model3,
			'error'=>$error,
		));
	}
	
	
	public function actionCreateGovUser()
	{
		if(Yii::app()->user->checkAccess('guest') || Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$error='error unknown';
		$options = new OptionRecord;
		$model=new User;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		//initialize variables
		$model->country = 'Philippines';
		$model->role = 'Government User';
		$model->organization_id = 0;
		
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			//check confirm password match
			if($model->password==$_POST['confirmPassword']){
				//check if user already exist
        		$record=User::model()->findByAttributes(array('username'=>$model->username));
		        if($record!=null){
		        }
		        else{
					//set attributes
					$model->date_created = CTimestamp::formatDate('Y-m-d',time());;
					$model->time_created = CTimestamp::formatDate('h:i:s a',time());;
					$model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());;
					$model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());;
					$model->sex = $options->getSexatIndex($model->sex);
					$model->region = $options->getRegionatIndex($model->region);
					$model->province = $options->getProvinceatIndex($model->province);
					$model->city_or_municipality = $options->getCityorMunicipalityatIndex($model->city_or_municipality);
					$model->account_status = 'pending';
					
					$model->password = md5($model->password);
					if($model->save()){
						Yii::app()->authManager->assign('govUser',$model->id);
						$this->redirect(array('view','id'=>$model->id));
					}
		        }
		        $error = 'usernameExist';
			}
			else{
				$error = 'confirmPassword';
			}
		}
		
		//reset index values
		$model->sex = $options->getSexIndex($model->sex);
		$model->region = $options->getRegionIndex($model->region);
		$model->province = $options->getProvinceIndex($model->province);
		$model->city_or_municipality = $options->getCityorMunicipalityIndex($model->city_or_municipality);
		
		$model->password='';
		$this->render('createGovUser',array(
			'model'=>$model,
			'error'=>$error,
		));
	}
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateGov($id)
	{
		if(Yii::app()->user->checkAccess('updateSelf')||Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$error='error unknown';
		$options = new OptionRecord;
		$model=User::model()->findByPk($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			//set attributes
			$model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());;
			$model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());;
			$model->sex = $options->getSexatIndex($model->sex);
			$model->region = $options->getRegionatIndex($model->region);
			$model->province = $options->getProvinceatIndex($model->province);
			$model->city_or_municipality = $options->getCityorMunicipalityatIndex($model->city_or_municipality);
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		//reset index values
		$model->sex = $options->getSexIndex($model->sex);
		$model->region = $options->getRegionIndex($model->region);
		$model->province = $options->getProvinceIndex($model->province);
		$model->city_or_municipality = $options->getCityorMunicipalityIndex($model->city_or_municipality);
		
		$this->render('updateGov',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->user->checkAccess('admin')&&!$id==0 || Yii::app()->user->checkAccess('bacSec') ) //to ensure that the admin account will not be deleted
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->checkAccess('admin'))
		{
		$dataProvider=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"role='Admin'",
		)));
		}
		else{
			$dataProvider = null;
		}
		$dataProvider2=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"account_status='active' and role='Government User'",
		)));
		$dataProvider3=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"role='Private User' and account_status='active'",
		)));
		
		$dataProvider4=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"role='Private User' and account_status='pending'",
		)));

		
		$dataProvider5=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"role='Government User' and account_status='pending'",
		)));
		/*$dataProvider=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"account_status='active'",
		)));*/
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'dataProvider2'=>$dataProvider2,
			'dataProvider3'=>$dataProvider3,
			'dataProvider4'=>$dataProvider4,
			'dataProvider5'=>$dataProvider5,
		));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndexBac()
	{
		$dataProvider=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"account_status='active' and role='Government User' and is_bac_member='true'",
		)));
		
		$dataProvider2=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"account_status='active' and role='Government User' and is_bac_secretariat='true'",
		)));

		$dataProvider3=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"account_status='active' and role='Government User' and is_bac_chairman='true'",
		)));

		$dataProvider4=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"account_status='active' and role='Government User' and is_local_chief_executive='true'",
		)));

		$this->render('indexBac',array(
			'dataProvider'=>$dataProvider,
			'dataProvider2'=>$dataProvider2,
			'dataProvider3'=>$dataProvider3,
			'dataProvider4'=>$dataProvider4,
		));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndexGov($show)
	{
		$dataProvider=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"account_status='".$show."' and role='Government User'",
		)));
		$this->render('indexGov',array(
			'dataProvider'=>$dataProvider,
			'show'=>$show,
		));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndexPrivate($show)
	{
		$dataProvider=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"account_status='".$show."' and role='Private User'",
		)));
		/*$dataProvider=new CActiveDataProvider('User',array('criteria'=>array(
			'condition'=>"account_status='active'",
		)));*/
		$this->render('indexPrivate',array(
			'dataProvider'=>$dataProvider,
			'show'=>$show,
		));
	}
	
	public function actionApprove($id)
	{
		if(Yii::app()->user->checkAccess('bacSec'))
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


	public function actionDeactivate($id)
	{
		if(Yii::app()->user->checkAccess('bacSec'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model=$this->loadModel($id);
		$model->account_status='inactive';
		//$model->date_approved = CTimestamp::formatDate('Y-m-d',time());;
		//$model->time_approved = CTimestamp::formatDate('h:i:s a',time());;

		if($model->save())
			$this->redirect(array('view','id'=>$model->id));
			
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}


	public function actionApproveGov($id)
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

	public function actionDeactivateGov($id)
	{
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model=$this->loadModel($id);
		$model->account_status='inactive';
	
		if($model->save())
			$this->redirect(array('view','id'=>$model->id));
			
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}	

	public function actionSearch()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('search',array(
			'model'=>$model,
		));
	}
	
	public function actionSetAsBac($id){
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$model->is_bac_member = 'true';
		if($model->save()){
			Yii::app()->authManager->assign('bacUser',$model->id);
		}
		$this->render('view',array(
			'model'=>$model,
		)
		);
	}
	
	
	public function actionSetAsBacSec($id){
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$model->is_bac_secretariat = 'true';
		if($model->save()){
			Yii::app()->authManager->assign('bacSec',$model->id);
		}
		$this->render('view',array(
			'model'=>$model,
		)
		);
	}

	public function actionSetAsBacChair($id){
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$model->is_bac_chairman = 'true';
		if($model->save()){
			Yii::app()->authManager->assign('bacChair',$model->id);
		}
		$this->render('view',array(
			'model'=>$model,
		)
		);
	}

	public function actionSetAsLCE($id){
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$model->is_local_chief_executive = 'true';
		if($model->save()){
			Yii::app()->authManager->assign('LCE',$model->id);
		}
		$this->render('view',array(
			'model'=>$model,
		)
		);
	}

	public function actionRemoveAsBac($id){
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$model->is_bac_member = 'false';
		if($model->save()){
			Yii::app()->authManager->revoke('bacUser',$model->id);
		}
		$this->render('view',array(
			'model'=>$model,
		)
		);
	}
	
	public function actionRemoveAsBacSec($id){
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$model->is_bac_secretariat = 'false';
		if($model->save()){
			Yii::app()->authManager->revoke('bacSec',$model->id);
		}
		$this->render('view',array(
			'model'=>$model,
		)
		);
	}
	public function actionRemoveAsBacChair($id){
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$model->is_bac_chairman = 'false';
		if($model->save()){
			Yii::app()->authManager->revoke('bacChair',$model->id);
		}
		$this->render('view',array(
			'model'=>$model,
		)
		);
	}
	public function actionRemoveAsLCE($id){
		if(Yii::app()->user->checkAccess('admin'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model = $this->loadModel($id);
		$model->is_local_chief_executive = 'false';
		if($model->save()){
			Yii::app()->authManager->revoke('LCE',$model->id);
		}
		$this->render('view',array(
			'model'=>$model,
		)
		);
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(Yii::app()->user->checkAccess('bacSec'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
