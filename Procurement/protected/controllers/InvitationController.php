<?php
class InvitationController extends Controller
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
	/*public function accessRules()
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
	}*/

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$preBid = PreBidConference::model()->findByPk($id);
		$bidEnv = BidEnvelopesOpening::model()->findByPk($id);
		$bidEval = BidEvaluation::model()->findByPk($id);
		$postQua = PostQualification::model()->findByPk($id);
		$awarding = Awarding::model()->findByPk($id);
		$ntp = Ntp::model()->findByPk($id);
		$nego = Negotiation::model()->findByPk($id);
		$shortlist = Shortlist::model()->findByPk($id);
		$eliCheck = EligibilityCheck::model()->findByPk($id);
		$loi = LoiAndEligibilityReceipt::model()->findByPk($id);
		$model = $this->loadModel($id);
		$model2 = User::model()->findByPk($model->created_by);
		$bids=new CActiveDataProvider('Bid',array(
		    'criteria'=>array(
		        'condition'=>'invitation_id='.$id,
		    	),
		    )
		  );
		
		$sho=new CActiveDataProvider('Bid',array(
		    'criteria'=>array(
		        'condition'=>'invitation_id='.$id." and status='shortlisted'",
		    	),
		    )
		  );
		  
		$lois=new CActiveDataProvider('Loi',array(
		    'criteria'=>array(
		        'condition'=>'invitation_id='.$id,
		    	),
		    )
		  );
		  
		$this->render('view',array(
			'model'=>$model,
			'bac'=>$model2,
			'preBid'=>$preBid,
			'bidEnv'=>$bidEnv,
			'bidEval'=>$bidEval,
			'postQua'=>$postQua,
			'awarding'=>$awarding,
			'ntp'=>$ntp,
			'bids'=>$bids,
			'lois'=>$lois,
			'loi'=>$loi,
			'eliCheck'=>$eliCheck,
			'shortlist'=>$shortlist,
			'nego'=>$nego,
			'sho'=>$sho,
		));
	}
	
	public function actionTry()
	{
		$this->render('try');
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		// now check the bizrule for this user
	    if (Yii::app()->user->checkAccess('bacSec')||Yii::app()->user->checkAccess('bacUser')||Yii::app()->user->checkAccess('bacChair'))
	    {
	    }
	    else{
		    throw new CHttpException(403, 'You are not authorized to perform this action');
	    }
	    
		$options = new OptionRecord();
		$error = 'unknown';
		$model=new Invitation;
		$preBid = new PreBidConference;
		$bidEnv = new BidEnvelopesOpening();
		$bidEval = new BidEvaluation();
		$postQua = new PostQualification();
		$awarding = new Awarding;
		$ntp = new Ntp;
		$eliCheck = new EligibilityCheck;
		$loi = new LoiAndEligibilityReceipt;
		$shortlist = new Shortlist;
		$nego = new Negotiation;
		//$parser = CDateTimeParser();

		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['time_closing']))
			$model->time_closing=$_POST['time_closing'];
		else
			$model->time_closing='17:00';

		if(isset($_POST['time_opening']))
			$model->time_opening=$_POST['time_opening'];
		else
			$model->time_opening='08:00';
			
		if(isset($_POST['Invitation']))
		{
			$model->attributes=$_POST['Invitation'];
			
			$model->date_published = CTimestamp::formatDate('Y-m-d',time());
			$model->time_published = CTimestamp::formatDate('h:i:s a',time());
			$model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
			$model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
			$model->created_by = Yii::app()->user->id;
			$model->total_document_request = 0;
			
			$model->classification = $options->getClassificationatIndex($model->classification);
			$model->category = $options->getBusinessCategoryatIndex($model->category);

			 			
			if($model->save()){
				//pre-bid
				$preBid->id = $model->id;
				$preBid->save();
				//bidEnv
				$bidEnv->id = $model->id;
				$bidEnv->save();
				//bidEval
				$bidEval->id = $model->id;
				$bidEval->save();
				//postQua
				$postQua->id = $model->id;
				$postQua->save();
				//awarding
				$awarding->save();
				$awarding->id = $model->id;
				//ntp
				$ntp->id = $model->id;
				$ntp->save();
				//loi and eligibility
				$loi->id = $model->id;
				$loi->save();
				//eligibility check
				$eliCheck->id = $model->id;
				$eliCheck->save();
				//shortlist
				$shortlist->id = $model->id;
				$shortlist->save();
				//negotiation
				$nego->id = $model->id;
				$nego->save();
				
				$this->redirect(array('view','id'=>$model->id));
			}
		
		}

		
		$model->classification = $options->getClassificationIndex($model->classification);
		$model->category = $options->getBusinessCategoryIndex($model->category);
		
		$this->render('create',array(
			'model'=>$model,
			'error'=>$error,
		));
	}

public function actionPostAward($id){
	$model = $this->loadModel($id);
	$model->status = "awarded";
	$model->save();
	 
	$model2 = Award::model()->findByPk($id);
	if($model2 == null)
	$model2 = new Award;
	
	$model2->attributes = $model->attributes;

	$criteria= new CDbCriteria();
	$criteria->condition="invitation_id='$model2->id' and user_id= '$model2->awardee'";
	$result=Bid::model()->find($criteria);
	$model2->amount=$result->correct_calculated_price;
	if($model2->save()){
		//update bid
		$b = Bid::model()->findByAttributes(array('invitation_id'=>$id,'user_id'=>$model->awardee));
		$b->status='accepted';
		$b->save();
		$this->redirect(array('award/index'));
	}
	
	$this->redirect(array('award/view','id'=>$model->id));
}


public function actionFailBid($id){
	$model = $this->loadModel($id);
	$model->status = "failed";
	$model->save();
	
	$model2 = Award::model()->findByPk($id);
	if($model2 == null)
	$model2 = new Award;
	
	$model2->attributes = $model->attributes;
	if($model2->save()){
		//update bid
		$criteria= new CDbCriteria();
		$criteria->condition= "invitation_id='$id'";
		$bid= Bid::model()->findAll($criteria);
		foreach($bid as $b){
		$b->status="pending";
		$b->save();
		}
		//$this->redirect(array('award/index'));
	}
	
	$this->redirect(array('invitation/view','id'=>$model->id));
}
/*
public function actionFailLCB($id){
		if(Yii::app()->user->checkAccess('bacChair')){
		}
		else{
		    throw new CHttpException(403, 'You are not authorized to perform this action');
		}
	
	}
*/
public function actionAwardTo($id,$inv_id){
	$model = $this->loadModel($inv_id);
	$model->awardee = $id;
	$model->save();
	$this->redirect(array('invitation/view','id'=>$model->id));
}
	
public function actionUpdateBD($id)
	{
		$model=$this->loadModel($id);
		$bid_doc= new BidDocs;
		// now check the bizrule for this user
	    if ((Yii::app()->user->checkAccess('bacSec')))
	    {
	    }
	    else{	
		    throw new CHttpException(403, 'You are not authorized to perform this action');
	    }
	    $error = '';
	    
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
			
		if(isset($_FILES["file"]))
		{
				//documents file
				if ($_FILES["file"]["error"] > 0)
				  {
				  $error = "Error: " . $_FILES["file"]["error"] . "<br />";
				  }
				else
				  {
				  //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				  //echo "Type: " . $_FILES["file"]["type"] . "<br />";
				  //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				  //echo "Stored in: " . $_FILES["file"]["tmp_name"];
				  
				  if (file_exists("files/bd/" . $_FILES["file"]["name"]))
				      {
		      			$_FILES["file"]["name"] = $_FILES["file"]["name"].CTimestamp::formatDate('Ymdhisa',time()).'bd';
				      	$error = 'fileExists';
				      }
				    
				      
				      {
				      move_uploaded_file($_FILES["file"]["tmp_name"], "files/bd/". $_FILES["file"]["name"]);
				      //$model->bidding_document = $_FILES["file"]["name"];
				      //$model->save();
							$bid_doc->bidding_document = $_FILES["file"]["name"];
							$bid_doc->id=$model->id;
							$bid_doc->save();
				      }
						$this->redirect(array('view','id'=>$model->id));	
				   }
								
		}
		
		$this->render('updateBD',array(
			'model'=>$model,
			'error'=>$error,
		));
	}
	
public function actionViewBid($id){
	
    throw new CHttpException(403, 'You are not authorized to perform this action');

    	$model = Bid::model()->findByAttributes(array('user_id'=>Yii::app()->user->id,'invitation_id'=>$id));
	$modele = EligibilityBid::model()->findByPk($model->id);
	$modelt = TechnicalBid::model()->findByPk($model->id);
	$modelf = FinancialBid::model()->findByPk($model->id);
	
	$this->render('viewBid',array(
		'model'=>$model,
		'modele'=>$modele,
		'modelt'=>$modelt,
		'modelf'=>$modelf,
	));
}

public function actionSubmitBid($id){
    throw new CHttpException(403, 'You are not authorized to perform this action');
	if(Yii::app()->user->checkAccess('privateUser')){
		
	}
	else{
	    throw new CHttpException(403, 'You are not authorized to perform this action');
	}
	$error = '';
	
	//check if bid  already submitted
	$temp = Bid::model()->findByAttributes(array('invitation_id'=>$id,'user_id'=>Yii::app()->user->id));
	if($temp===null){
		
	}
	else{
	    throw new CHttpException(403, 'You are not authorized to perform this action');
	}
	
	$model = new Bid;
	$modele = new EligibilityBid;
	$modelt = new TechnicalBid;
	$modelf = new FinancialBid;
	
	$model->invitation_id=$id;
	$model->user_id=Yii::app()->user->id;
	
		if(isset($_POST['Bid'])){
			$model->invitation_id=$id;
			$model->user_id=Yii::app()->user->id;
			// file e
			if ($_FILES["filee"]["error"] > 0)
			  {
			  $error = "Error: eligibilityBidError";
			  }
			else if ($_FILES["filet"]["error"] > 0)
			  {
			  $error = "Error: technicalBidError";
			  }
			else if ($_FILES["filef"]["error"] > 0)
			  {
			  $error = "Error: financialBidError";
			  }
			else
			  {
			  	
		    if (file_exists("files/bid/" . $_FILES["filee"]["name"]))
		      {
		      //echo $_FILES["filee"]["name"] . " already exists. ";
		      $_FILES["filee"]["name"] = $_FILES["filee"]["name"].CTimestamp::formatDate('Ymdhisa',time()).'e';
		      $error = 'eligibilityFileExists';
		      }
		    if (file_exists("files/bid/" . $_FILES["filet"]["name"]))
		      {
		      //echo $_FILES["filet"]["name"] . " already exists. ";
		      $_FILES["filet"]["name"] = $_FILES["filet"]["name"].CTimestamp::formatDate('Ymdhisa',time()).'t';
		      $error = 'technicalFileExists';
		      }
		    if (file_exists("files/bid/" . $_FILES["filef"]["name"]))
		      {
		      //echo $_FILES["filef"]["name"] . " already exists. ";
		      $_FILES["filef"]["name"] = $_FILES["filef"]["name"].CTimestamp::formatDate('Ymdhisa',time()).'f';
		      $error = 'financialFileExists';
		      }
		      
		      {
		      //$model->bidding_document = $_FILES["filee"]["name"];
		      if($model->save()){
			      move_uploaded_file($_FILES["filee"]["tmp_name"], "files/bid/". $_FILES["filee"]["name"]);
			      $modele->id = $model->id;
			      $modele->file_location = $_FILES["filee"]["name"];
			      $modele->status = 'pending';
			      $modele->date_submitted = CTimestamp::formatDate('Y-m-d',time());
				  $modele->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			      $modele->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
				  $modele->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
				  if($modele->save()){
			      
				      move_uploaded_file($_FILES["filet"]["tmp_name"], "files/bid/". $_FILES["filet"]["name"]);
				      $modelt->id = $model->id;
				      $modelt->file_location = $_FILES["filet"]["name"];
				      $modelt->status = 'pending';
				      $modelt->date_submitted = CTimestamp::formatDate('Y-m-d',time());
					  $modelt->time_submitted = CTimestamp::formatDate('h:i:s a',time());
				      $modelt->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
					  $modelt->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
					  if($modelt->save()){
				      
						  move_uploaded_file($_FILES["filef"]["tmp_name"], "files/bid/". $_FILES["filef"]["name"]);
					      $modelf->id = $model->id;
					      $modelf->file_location = $_FILES["filef"]["name"];
					      $modelf->status = 'pending';
					      $modelf->date_submitted = CTimestamp::formatDate('Y-m-d',time());
						  $modelf->time_submitted = CTimestamp::formatDate('h:i:s a',time());
					      $modelf->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
						  $modelf->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
						  if($modelf->save()){
				  				$this->redirect(array('view','id'=>$id));
						  }
					      else{
					      	$error='cannotSaveFBid';
					      }
					  }
				      else{
				      	$error='cannotSaveTBid';
				      }
				  }
			      else{
			      	$error='cannotSaveEBid';
			      }
		      }
		      else{
		      	$error='cannotSaveBid';
		      }
		      }
								
		 	}
		}
		
		try{
		$model->delete();
		$modele->delete();
		$modelf->delete();
		$modelt->delete();
		}
		catch(Exception $e){
		
		}
	$model->invitation_id = $id;
	$model->user_id = Yii::app()->user->id;
	
	
	$this->render('submitBid',array('model'=>$model,'modele'=>$modele,'modelt'=>$modelt,'modelf'=>$modelf,'error'=>$error));
	
	}
	
public function actionUpdateInvitation($id)
	{
		$options = new OptionRecord();
		$model=$this->loadModel($id);
		if ((Yii::app()->user->checkAccess('bacSec')))
	    {
	    }
	    else{
		    throw new CHttpException(403, 'You are not authorized to perform this action');
	    }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['time_closing']))
			$model->time_closing=$_POST['time_closing'];
		else
			$model->time_closing='17:00';

		if(isset($_POST['time_opening']))
			$model->time_opening=$_POST['time_opening'];
		else
			$model->time_opening='08:00';
		if(isset($_POST['prebid_time']))
			$model->prebid_time=$_POST['prebid_time'];
		else
			$model->prebid_time='08:00';
		
		if(isset($_POST['Invitation']))
		{
			$model->attributes=$_POST['Invitation'];
			$model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
			$model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
			
			
			//$model->classification = $options->getClassificationatIndex($model->classification);
			$model->category = $options->getBusinessCategoryatIndex($model->category);
			
			
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		//$model->classification = $options->getClassificationIndex($model->classification);
		$model->category = $options->getBusinessCategoryIndex($model->category);
		
		$this->render('update',array(
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
	    throw new CHttpException(403, 'You are not authorized to perform this action');
	 	$options = new OptionRecord();
		$model=$this->loadModel($id);
		if ((Yii::app()->user->checkAccess('bacUser')) || Yii::app()->user->checkAccess('admin'))
	    {
	    }
	    else{
		    throw new CHttpException(403, 'You are not authorized to perform this action');
	    }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['time_closing']))
			$model->time_closing=$_POST['time_closing'];
		else
			$model->time_closing='17:00';

		if(isset($_POST['time_opening']))
			$model->time_opening=$_POST['time_opening'];
		else
			$model->time_opneing='08:00';
		
		if(isset($_POST['prebid_time']))
			$model->prebid_time=$_POST['prebid_time'];
		else
			$model->prebid_time='08:00';

		if(isset($_POST['Invitation']))
		{
			$model->attributes=$_POST['Invitation'];
			$model->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
			$model->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
			
			
			$model->classification = $options->getClassificationatIndex($model->classification);
			$model->category = $options->getBusinessCategoryatIndex($model->category);
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		$model->classification = $options->getClassificationIndex($model->classification);
		$model->category = $options->getBusinessCategoryIndex($model->category);
		
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
		if(Yii::app()->user->checkAccess('bacSec'))
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
			$show = 'active';
			
		$dataProvider=new CActiveDataProvider('Invitation',array('criteria'=>array(
			'condition'=>"status='".$show."'",
		)));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'show'=>$show,
		));
	}

	public function actionIndexAwarded()
	{		
		$show = 'awarded';
		$dataProvider=new CActiveDataProvider('Invitation',array('criteria'=>array(
			'condition'=>"status='".$show."'",
		)));
		$this->render('indexAwarded',array(
			'dataProvider'=>$dataProvider,
			'show'=>$show,
		));
	}
	
	public function actionIndexAll()
	{
		if(!isset($show))
			$show = 'active';
			
		$dataProvider=new CActiveDataProvider('Invitation',array('criteria'=>array(
			'condition'=>"status='".$show."'",
		)));
		$this->render('indexAll',array(
			'dataProvider'=>$dataProvider,
			'show'=>$show,
		));
	}
	
	public function actionIndexCat($cat)
	{
		$dataProvider=new CActiveDataProvider('Invitation',array('criteria'=>array(
			'condition'=>"category='".$cat."' and status='active'",
		)));
		$this->render('indexCat',array(
			'dataProvider'=>$dataProvider,
			'cat'=>$cat,
		));
	}
	
	public function actionIndexCatAwarded($cat)
	{
		$dataProvider=new CActiveDataProvider('Invitation',array('criteria'=>array(
			'condition'=>"category='".$cat."' and status='awarded'",
		)));
		$this->render('indexCat',array(
			'dataProvider'=>$dataProvider,
			'cat'=>$cat,
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
		$model->status='active';
		$model->date_approved = CTimestamp::formatDate('Y-m-d',time());;
		$model->time_approved = CTimestamp::formatDate('h:i:s a',time());;

		if($model->save())
			$this->redirect(array('view','id'=>$model->id));
			
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	
	/**
	 * Manages all models.
	 */

	public function actionSearch()
	{
		$model=new Invitation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invitation']))
			$model->attributes=$_GET['Invitation'];

		$this->render('search',array(
			'model'=>$model,
		));
	}

	public function actionSearchAward()
	{
		$model=new Invitation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invitation']))
			$model->attributes=$_GET['Invitation'];

		$this->render('searchAward',array(
			'model'=>$model,
		));
	}
	
	public function actionAdmin()
	{
		if(Yii::app()->user->checkAccess('bacSec'))
		{
		}
		else{
	        throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$model=new Invitation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invitation']))
			$model->attributes=$_GET['Invitation'];

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
		$model=Invitation::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='invitation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
