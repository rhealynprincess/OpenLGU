<?php

class BidController extends Controller
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
		$model = Bid::model()->findByAttributes(array('user_id'=>Yii::app()->user->id,'invitation_id'=>$id));
	$criteria=new CDbCriteria();
	$criteria->condition="id='$model->id'";
	$modele= EligibilityBid::model()->find($criteria);		
		
		$modelt = TechnicalBid::model()->find($criteria);
		$modelf = FinancialBid::model()->find($criteria);
		
		if($modele==null)
			$modelE = new EligibilityBid;
		if($modelt==null)
			$modelt = new TechnicalBid;
		if($modelf==null)
			$modelf = new FinancialBid;
			
		$this->render('view',array(
			'model'=>$model,
			'modele'=>$modele,
			'modelt'=>$modelt,
			'modelf'=>$modelf,
		));
	}

	public function actionViewEli($id)
	{
		$model = Bid::model()->findByAttributes(array('user_id'=>Yii::app()->user->id,'invitation_id'=>$id));

		$criteria=new CDbCriteria();
		$criteria->condition="id='$model->id'";
		$modele= EligibilityBid::model()->findAll($criteria);		
		
		
		$this->render('viewEli',array(
			'model'=>$model,
			'modele'=>$modele,
		));
	}
	
	
	public function actionViewDocs($id)
	{
		$criteria= new CDbCriteria();
		$criteria->condition="id='$id'";
		$model  = Bid::model()->find($criteria);
		$modelE = EligibilityBid::model()->find($criteria);
		$modelF = FinancialBid::model()->find($criteria);
		$modelT = TechnicalBid::model()->find($criteria);
		
		$this->render('viewDocs',array(
			'model' =>$model,			
			'modele'=>$modelE,
			'modelf'=>$modelF,
			'modelt'=>$modelT,
		));
	}

	public function actionCreateShortlist($id)
	{
		if(Yii::app()->user->checkAccess('bacSec')){
			
		}
		else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$bids=new CActiveDataProvider('Bid',array(
				    'criteria'=>array(
				        'condition'=>'invitation_id='.$id,
				    	),
				    )
				  );

		$this->render('createShortlist',array(
			'inv_id'=>$id,
			'bids'=>$bids,
		));	
	}
		
	public function actionCheck($id)
	{
		if(Yii::app()->user->checkAccess('bacUser')||Yii::app()->user->checkAccess('admin')){
			
		}
		else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$bids=new CActiveDataProvider('Bid',array(
				    'criteria'=>array(
				        'condition'=>'invitation_id='.$id,
				    	),
				    )
				  );

		$this->render('checkBids',array(
			'inv_id'=>$id,
			'bids'=>$bids,
		));	
	}
	
	public function actionCheckBid($id, $checker)
	{
		$model = Bid::model()->findByPk($id);
		//$modelE = EligibilityBid::model()->findByAttributes('id'=>$model->id);
		$criteria=new CDbCriteria();
		$criteria->condition="id='$id' and checker='$checker'";
		$modele= EligibilityBid::model()->find($criteria);
		
		if($modele==null){
			$criteria=new CDbCriteria();
			$criteria->condition="id='$id' and checker isNull"; //check if the user is the first to check
			$modele= EligibilityBid::model()->find($criteria);
			if($modele==null){ //if the others has already checked
			$criteria=new CDbCriteria();
			$criteria->condition="id='$id'"; 
			$modeleTemp= EligibilityBid::model()->find($criteria);
			$modele= new EligibilityBid;
			$modele->id=$id;
			$modele->status = 'pending';
			$modele->file_location=$modeleTemp->file_location;
			$modele->date_submitted = CTimestamp::formatDate('Y-m-d',time());
			$modele->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			$modele->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
			$modele->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
			$modele->checker = Yii::app()->user->id;
			$modele->save();
			}
			else{ //if he is the first to check
			$modele->checker = Yii::app()->user->id;
			$modele->save();
			}
		}

		$criteria=new CDbCriteria();
		$criteria->condition="id='$id' and checker='$checker'";
		
		$modelt = TechnicalBid::model()->find($criteria);
		
		if($modelt==null){
			$criteria=new CDbCriteria();
			$criteria->condition="id='$id' and checker isNull"; //check if the user is the first to check
			$modelt= TechnicalBid::model()->find($criteria);
			if($modelt==null){ //if the others has already checked
			$criteria=new CDbCriteria();
			$criteria->condition="id='$id'"; 
			$modeltTemp= TechnicalBid::model()->find($criteria);
			$modelt= new TechnicalBid;
			$modelt->id=$id;
			$modelt->status = 'pending';
			$modelt->file_location=$modeltTemp->file_location;
			$modelt->date_submitted = CTimestamp::formatDate('Y-m-d',time());
			$modelt->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			$modelt->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
			$modelt->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
			$modelt->checker = Yii::app()->user->id;
			$modelt->save();
			}
			else{ //if he is the first to check
			$modelt->checker = Yii::app()->user->id;
			$modelt->save();
			}
		}		

		$criteria=new CDbCriteria();
		$criteria->condition="id='$id' and checker='$checker'";
		
		$modelf = FinancialBid::model()->find($criteria);
		if($modelf==null){
			$criteria=new CDbCriteria();
			$criteria->condition="id='$id' and checker isNull"; //check if the user is the first to check
			$modelf= FinancialBid::model()->find($criteria);
			if($modelf==null){ //if the others has already checked
			$criteria=new CDbCriteria();
			$criteria->condition="id='$id'"; 
			$modelfTemp= FinancialBid::model()->find($criteria);
			$modelf= new FinancialBid;
			$modelf->id=$id;
			$modelf->status = 'pending';
			$modelf->file_location=$modelfTemp->file_location;
			$modelf->date_submitted = CTimestamp::formatDate('Y-m-d',time());
			$modelf->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			$modelf->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
			$modelf->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
			$modelf->checker = Yii::app()->user->id;
			$modelf->save();
			}
			else{ //if he is the first to check
			$modelf->checker = Yii::app()->user->id;
			$modelf->save();
			}
		}

		if(isset($_POST['Bid'])){
		
			if(isset($_POST['EligibilityBid'])){

				if($modele==null){
					$modele=new EligibilityBid;
					if($_POST['EligibilityBid']->status=='0')
						$modele->status = 'pass';
					else if($_POST['EligibilityBid']->status=='1')
						$modele->status = 'fail';
					else if($_POST['EligibilityBid']->status=='2')
						$modele->status = 'pending';
					$modele->id=$id;
					$modele->file_location=$_POST['EligibilityBid']->file_location;
					$modele->date_submitted = CTimestamp::formatDate('Y-m-d',time());
				  $modele->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			    $modele->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
				  $modele->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
					$modele->checker = Yii::app()->user->id;
					$modele->save();
					}

				else{
				$modele->attributes = $_POST['EligibilityBid'];
					if($modele->status=='0')
						$modele->status = 'pass';
					else	if($modele->status=='1')
						$modele->status = 'fail';
					else	if($modele->status=='2')
						$modele->status = 'pending';

					$modele->checker = Yii::app()->user->id;
					$modele->save();
				}
		}
				/*
				if(count($modelE)==0){
										
					$modele= new EligibilityBid;
					$modele->attributes = $_POST['EligibilityBid'];
					if($modele->status=='0')
						$modele->status = 'pass';
					else
						$modele->status = 'fail';
					$modele->date_submitted = CTimestamp::formatDate('Y-m-d',time());
				  $modele->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			      $modele->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
				  $modele->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
					$modele->checker = Yii::app()->user->id;
					$modele->save();
				}
				
				else{
				
				$modelE->attributes = $_POST['EligibilityBid'];
					if($modelE->status=='0')
						$modelE->status = 'pass';
					else
						$modelE->status = 'fail';
					
					$modelE->checker = Yii::app()->user->id;
					$modelE->save();
				}*/

				
					//$modelE->save();
					
			
			if(isset($_POST['TechnicalBid'])){
					
				if($modelt==null){
					$modelt=new TechnicalBid;
					if($_POST['TechnicalBid']->status=='0')
						$modelt->status = 'pass';
				else if($_POST['EligibilityBid']->status=='1')
						$modelt->status = 'fail';
					else if($_POST['EligibilityBid']->status=='2')
						$modelt->status = 'pending';

						$modelt->id=$id;
						$modelt->file_location=$_POST['TechnicalBid']->file_location;
						$modelt->date_submitted = CTimestamp::formatDate('Y-m-d',time());
					  $modelt->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			      $modelt->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
					  $modelt->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
						$modelt->checker = Yii::app()->user->id;
						$modelt->save();
					}				
				else{
					$modelt->attributes = $_POST['TechnicalBid'];
					if($modelt->status=='0')
						$modelt->status = 'pass';
				else	if($modelt->status=='1')
						$modelt->status = 'fail';
					else	if($modelt->status=='2')
						$modelt->status = 'pending';
						$modelt->checker = Yii::app()->user->id;
						$modelt->save();
					}
			}
			if(isset($_POST['FinancialBid'])){
				
				if($modelf==null){
					$modelf=new FinancialBid;
					if($_POST['FinancialBid']->status=='0')
						$modelf->status = 'pass';
					else if($_POST['EligibilityBid']->status=='1')
						$modelf->status = 'fail';
					else if($_POST['EligibilityBid']->status=='2')
						$modelf->status = 'pending';	
						$modelf->id=$id;
						$modelf->file_location=$_POST['FinancialBid']->file_location;
						$modelf->date_submitted = CTimestamp::formatDate('Y-m-d',time());
					  $modelf->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			      $modelf->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
					  $modelf->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
						$modelf->checker = Yii::app()->user->id;
						$modelf->save();
					}	

				else{
					$modelf->attributes = $_POST['FinancialBid'];
					if($modelf->status=='0')
						$modelf->status = 'pass';
					else	if($modelf->status=='1')
						$modelf->status = 'fail';
					else	if($modelf->status=='2')
						$modelf->status = 'pending';

						$modelf->checker = Yii::app()->user->id;
						$modelf->save();

				}
			}
			$this->redirect(array('/bid/check','id'=>$model->invitation_id));
		}
		

	
		if($modele->status=='pass')
			$modele->status = '0';
		else if($modele->status=='fail')
			$modele->status = '1';
		else if($modele->status=='pending')
			$modele->status = '2';
	

		if($modelt->status=='pass')
			$modelt->status = '0';
		else if($modelt->status=='fail')
			$modelt->status = '1';
		else if($modelt->status=='pending')
			$modelt->status = '2';
	

		if($modelf->status=='pass')
			$modelf->status = '0';
		else if($modelf->status=='fail')
			$modelf->status = '1';
		else if($modelf->status=='pending')
			$modelf->status = '2';
	
		$this->render('checkBid',array(
			'model'=>$model,
			'modele'=>$modele,
			'modelt'=>$modelt,
			'modelf'=>$modelf,
		));
	}
	
	public function actionCheckEli($id)
	{
	
		if(Yii::app()->user->checkAccess('bacSec')){
		
		}
		else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		
		$bids=new CActiveDataProvider('Bid',array(
				    'criteria'=>array(
				        'condition'=>'invitation_id='.$id,
				    	),
				    )
				  );
		$this->render('checkBidsEli',array(
			'bids'=>$bids,
			'inv'=>$id,
		));
	}
	
	public function actionCheckBidEli($id, $user_id)
	{
		$model = Bid::model()->findByAttributes(array('id'=>$id, 'user_id'=>$user_id));
		//$modelE = EligibilityBid::model()->findByAttributes(array('id'=>$model->id));
		$criteria=new CDbCriteria();
		$criteria->condition="id='$model->id'";
		$modele= EligibilityBid::model()->find($criteria);	
			if(isset($_POST['Bid'])){
		
			if(isset($_POST['EligibilityBid'])){
		
			$modelE= EligibilityBid::model()->findAll($criteria);	
			foreach($modelE as $modelee){				
				$modelee->attributes = $_POST['EligibilityBid'];
				if($modelee->status=='0')
					$modelee->status = 'pass';
				else
					$modelee->status = 'fail';
					
				$modelee->save();
			}
			}	
			$this->redirect(array('/bid/checkEli','id'=>$model->invitation_id));
		}
		
		if($modele->status=='pass')
			$modele->status = '0';
		else
			$modele->status = '1';
			
		$this->render('checkBidEli',array(
			'model'=>$model,
			'modele'=>$modele,
		));
	}
	
	public function actionSetAsLcb($id,$inv_id){
		$inv = Invitation::model()->findByPk($inv_id);
		$inv->lcb =$id;
		$inv->lcrb =$id;
		$inv->save();
		
		/*
		$bidEval = BidEvaluation::model()->findByPk($inv_id);
		$bidEval->lcb =$id;
		$bidEval->save();
		
		$postQua = PostQualification::model()->findByPk($inv_id);
		$postQua->lcrb =$id;
		$postQua->save();
		*/
	
		$this->redirect(array('invitation/view','id'=>$inv_id));
	}
	public function actionSetAsLcrb($id,$inv_id){
		$inv = Invitation::model()->findByPk($inv_id);
		$inv->lcb =$id;
		$inv->lcrb =$id;
		$inv->save();
		
		/*
		$bidEval = BidEvaluation::model()->findByPk($inv_id);
		$bidEval->lcb =$id;
		$bidEval->save();
		
		$postQua = PostQualification::model()->findByPk($inv_id);
		$postQua->lcrb =$id;
		$postQua->save();
		*/
	
		$this->redirect(array('invitation/view','id'=>$inv_id));
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
	public function actionAddToShortlist($id){
		$model = $this->loadModel($id);
		$model->status = 'shortlisted';
		$model->save();
		
		$this->redirect(array('bid/createShortlist','id'=>$model->invitation_id));
	}
	
	public function actionRemoveFromShortlist($id){
		$model = $this->loadModel($id);
		$model->status = 'active';
		$model->save();
		
		$this->redirect(array('bid/createShortlist','id'=>$model->invitation_id));
	}

	public function actionSubmit($id){
		if(Yii::app()->user->checkAccess('privateUser')){
		}
		else{
		    throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$error = '';
	
		//check if bid  already submitted
		$temp = Bid::model()->findByAttributes(array('invitation_id'=>$id,'user_id'=>Yii::app()->user->id));
		//new

		
		if($temp===null){
			$model = new Bid;
			$modele = new EligibilityBid;
			$modelt = new TechnicalBid;
			$modelf = new FinancialBid;		
			
			//set attributes
			$model->invitation_id=$id;
			$model->user_id=Yii::app()->user->id;
		}
		//update
		else{
			$model = $temp;
			$criteria = new CDbCriteria();
			$criteria-> condition = "id= '$model->id' and checker isNull";
			$modele = EligibilityBid::model()->find($criteria);
			$modelt = TechnicalBid::model()->find($criteria);
			$modelf = FinancialBid::model()->find($criteria);
		}
		
		if($modele==null)
			$modele = new EligibilityBid;
		if($modelt==null)
			$modelt = new TechnicalBid;
		if($modelf==null)
			$modelf = new FinancialBid;
		
		
		if(isset($_POST['Bid'])){
			$model->invitation_id=$id;
			$model->user_id=Yii::app()->user->id;
			$model->correct_calculated_price=$_POST['Bid']['correct_calculated_price'];
			// file e
			if ($_FILES["filet"]["error"] > 0)
			  {
			  $error = "Error: technicalBidError";
			  }
			else if ($_FILES["filef"]["error"] > 0)
			  {
			  $error = "Error: financialBidError";
			  }
			else
			  {
			  	
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
			      $modele->id = $model->id;
			
					$result=Organization::model()->findByPk(Yii::app()->user->id);
					$modele->file_location=$result->eligibility_doc_file_location;
			      		$modele->status = 'pending';
			      		$modele->date_submitted = CTimestamp::formatDate('Y-m-d',time());
				  	$modele->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			     		$modele->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
				  	$modele->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
						//$modele->checker = Yii::app()->user->id;
				  if($modele->save()){
			      
				        move_uploaded_file($_FILES["filet"]["tmp_name"], "files/bid/". $_FILES["filet"]["name"]);
				        $modelt->id = $model->id;
				     	$modelt->file_location = $_FILES["filet"]["name"];
				        $modelt->status = 'pending';
				        $modelt->date_submitted = CTimestamp::formatDate('Y-m-d',time());
					$modelt->time_submitted = CTimestamp::formatDate('h:i:s a',time());
				        $modelt->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
					$modelt->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
						//$modelf->checker = Yii::app()->user->id;
					if($modelt->save()){
				      
				        move_uploaded_file($_FILES["filef"]["tmp_name"], "files/bid/". $_FILES["filef"]["name"]);
					$modelf->id = $model->id;
			                $modelf->file_location = $_FILES["filef"]["name"];
			     	        $modelf->status = 'pending';
					$modelf->date_submitted = CTimestamp::formatDate('Y-m-d',time());
					$modelf->time_submitted = CTimestamp::formatDate('h:i:s a',time());
					$modelf->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
					$modelf->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
						//$modelf->checker = Yii::app()->user->id;
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
		 	//error in saving
			try{
			$model->delete();
			$modele->delete();
			$modelf->delete();
			$modelt->delete();
			}
			catch(Exception $e){
			
			}
		}
		
		
		$model->invitation_id = $id;
		$model->user_id = Yii::app()->user->id;
	
	
		$this->render('submit',array('model'=>$model,'modele'=>$modele,'modelt'=>$modelt,'modelf'=>$modelf,'error'=>$error));
	
	
	}
	
	

public function actionUpdateBidsCCP($id){
		if(Yii::app()->user->checkAccess('bacChair')){
			
		}
		else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		
		$inv= Invitation::model()->findByPk($id);
		if($inv->classification== 'Consulting Services'){
			
		$bids=new CActiveDataProvider('Bid',array(
				    'criteria'=>array(
				        'condition'=>'invitation_id='.$id,
								'order'=> 'correct_calculated_price desc'
				    	),
				    )
				  );
		}
	else{
		$bids=new CActiveDataProvider('Bid',array(
				    'criteria'=>array(
				        'condition'=>'invitation_id='.$id,
								'order'=> 'correct_calculated_price asc',
				    	),
				    )
				  );
	}
		$this->render('updateBidsCCP',array(
			'bids'=>$bids,
			'inv_id'=>$id,
		));	
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	
	public function actionCreate()
	{
			//if(Yii::app()->user->checkAccess('bacSec')){
			
		//}
		//else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		//}
		$model=new Bid;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bid']))
		{
			$model->attributes=$_POST['Bid'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		if(Yii::app()->user->checkAccess('bacChair')){
			
		}
		else{
		throw new CHttpException(403, 'You are not authorized to perform this action');
		}
	    $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bid']))
		{
			$model->attributes=$_POST['Bid'];
			if($model->save())
				$this->redirect(array('updateBidsCCP','id'=>$model->invitation_id));
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
		if(Yii::app()->user->checkAccess('privateUser')){
			
		}
		else{
			throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$inv_id = $this->loadModel($id)->invitation_id;
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('invitation/view','id'=>$inv_id));
	}

	/**
	 * Lists all models.
	 */


	public function actionIndex()
	{
	    throw new CHttpException(403, 'You are not authorized to perform this action');
		$dataProvider=new CActiveDataProvider('Bid');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */


	public function actionAdmin()
	{
	    throw new CHttpException(403, 'You are not authorized to perform this action');
		$model=new Bid('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Bid']))
			$model->attributes=$_GET['Bid'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionSubmitEli($id){

		if(Yii::app()->user->checkAccess('privateUser')){
		}
		else{
		    throw new CHttpException(403, 'You are not authorized to perform this action');
		}
		$error = '';
	
		//check if bid  already submitted
		$temp = Bid::model()->findByAttributes(array('invitation_id'=>$id,'user_id'=>Yii::app()->user->id));
		//new
		if($temp==null){
			$model = new Bid;
			//set attributes
			$model->invitation_id=$id;
			$model->user_id=Yii::app()->user->id;
			//$model2 = new EligibilityBid;
		}
		//update
		else{
			$model = $temp;
			/*$model2 = EligibilityBid::model()->findByAttributes(array('id'=>$model->id ));
			if($model2==null){
				$model2 = new EligibilityBid;
			}*/
		}
	
		
		if(isset($_POST['Bid'])){
			$user_id=Yii::app()->user->id;
			$criteria= new CDbCriteria();
			$criteria->condition="id='$id' and user_id='$user_id'";
			$temp=Bid::model()->find($criteria);

			if($temp==null){
				if ($_FILES["file"]["error"] > 0) {
			 		 $error = "Error: loiError";
			 	}
			  	
		   	 if (file_exists("files/bid/" . $_FILES["file"]["name"])){
		      	//echo $_FILES["filee"]["name"] . " already exists. ";
		     	 $_FILES["file"]["name"] = $_FILES["file"]["name"].CTimestamp::formatDate('Ymdhisa',time()).'l';
		     	 $error = 'eliFileExists';
		     	 }
		      	
			 move_uploaded_file($_FILES["file"]["tmp_name"], "files/bid/". $_FILES["file"]["name"]);			
			
			 $orgEli= Organization::model()->findByPk($user_id);
			 $orgEli->eligibility_doc_file_location=$_FILES["file"]["name"];
			 $orgEli->save();
			}
		else{
			

			
		    if ($_FILES["file"]["error"] > 0)
			  {
			  $error = "Error: loiError";
			  }
			  	
		    if (file_exists("files/bid/" . $_FILES["file"]["name"]))
		      {
		      //echo $_FILES["filee"]["name"] . " already exists. ";
		      $_FILES["file"]["name"] = $_FILES["file"]["name"].CTimestamp::formatDate('Ymdhisa',time()).'l';
		      $error = 'eliFileExists';
		      }
		      	
			      move_uploaded_file($_FILES["file"]["tmp_name"], "files/bid/". $_FILES["file"]["name"]);			
			
			$orgEli= Organization::model()->findByPk($user_id);
			$orgEli->eligibility_doc_file_location=$_FILES["file"]["name"];
			$orgEli->save();

			$criteria= new CDbCriteria();
			$criteria->condition="user_id='$user_id'";
			$bidEntry=Bid::model()->findAll($criteria);
			
			foreach($bidEntry as $bid){
			$bid_id=$bid->id;
			$criteria2= new CDbCriteria();
			$criteria2->condition="id='$bid_id'";
			$eliEntry= EligibilityBid::model()->findAll($criteria2);
				foreach(eliEntry as $eli){
				$eli->file_location=$_FILES["file"]["name"];
				$eli->save();
				}
			}
		
		}

		/*
			$model->invitation_id=$id;
			$model->user_id=Yii::app()->user->id;
			// file e
			
		
	      $model->id = $model->id;
			      $model->status = 'pending';
			      
			   //   $model2->file_location = $_FILES["file"]["name"];
			      $model2->date_submitted = CTimestamp::formatDate('Y-m-d',time());
				  $model2->time_submitted = CTimestamp::formatDate('h:i:s a',time());
			      $model2->date_last_modified = CTimestamp::formatDate('Y-m-d',time());
				  $model2->time_last_modified = CTimestamp::formatDate('h:i:s a',time());
					//$model2->checker = Yii::app()->user->id;
				  
		      	if($model->save()){
		      		$model2->id = $model->id;
		      		if($model2->save())
			      		$this->redirect(array('/invitation/view','id'=>$id));
		      	}
		      else{
		      	$error='cannotSaveBid';
		      }
				*/
			$this->redirect(array('/invitation/view','id'=>$id));
		}
		 
		
		$model->invitation_id = $id;
		$model->user_id = Yii::app()->user->id;
	
		$this->render('submitEli',array('model'=>$model,'error'=>$error));
	}
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */

	
	public function loadModel($id)
	{
		$model=Bid::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='bid-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
