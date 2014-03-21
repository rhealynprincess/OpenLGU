<?php
/* @var $this InvitationController */
/* @var $model Invitation */

if($model->classification=='Infrastructure'){

/*
echo '<a href="#ad">Advertisement</a> .';
echo '<a href="#bd">BD</a> .';
echo '<a href="#pre-bid">Pre-Bid</a> .';
echo '<a href="#envelope">Envelopes</a> .';
echo '<a href="#bidEvaluation">Bid Evaluation</a> .';
echo '<a href="#postQualification">Post-Qualification</a> .';
echo '<a href="#award">Award</a> .';
echo '<a href="#ntp">NTP</a>';
*/

//ADVERTISEMENTADVERTISEMENTADVERTISEMENTADVERTISEMENTADVERTISEMENTADVERTISEMENT
echo '<a name="ad"></a>';
echo '<br/>';


	if(Yii::app()->user->checkAccess('bacSec')){
		echo '<span class="rightLink">';
		echo CHtml::link(CHtml::encode('UPDATE'), array('updateInvitation','id'=>$model->id));
		echo '</span>';
	}
	/*
	if(Yii::app()->user->checkAccess('privateUser') && $model->status=='active'){
		$temp = Bid::model()->findByAttributes(array('invitation_id'=>$model->id,'user_id'=>Yii::app()->user->id));
		if($temp===null){
			echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('submit my bid'), array('bid/submit','id'=>$model->id));
			echo '</span>';
		}
		else{
			echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('view my bid'), array('bid/view','id'=>$model->id));
			echo '</span>';
		}
		$temp = Loi::model()->findByAttributes(array('invitation_id'=>$model->id,'user_id'=>Yii::app()->user->id));
			if($temp==null){
				echo '<span class="rightLink">';
				echo CHtml::link(CHtml::encode('submit loi'), array('loi/submit','id'=>$model->id));
				echo '</span>';
			}
			else{
				echo '<span class="rightLink">';
				echo CHtml::link(CHtml::encode('view loi'), array('loi/view','inv_id'=>$model->id,'id'=>$temp->id));
				echo '</span>';
			}
	}
	*/

echo $this->renderPartial('/invitation/_view2',array('data'=>$model,'creator'=>$bac));

echo '<br/><br/>';


//LOIELIGIBILITYCHECKLOIELIGIBILITYCHECKLOIELIGIBILITYCHECKLOIELIGIBILITYCHECK
echo '<div class="stages"><a name="loi"><span class="stages">Letter of Intent, Elgibility Check</a></div>';

		if(Yii::app()->user->checkAccess('bacSec')){
		 	echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('Set Date'), array('loiAndEligibilityReceipt/update', 'id'=>$model->id));
			echo '</span>';
		 	echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('Check Eligibility'), array('bid/checkEli', 'id'=>$model->id));
			echo '</span>';
			echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('View LOI'), array('loi/viewLois','id'=>$model->id));
			echo '</span>';
		}
	echo '<br/>';

if(isset($loi->date_start)){
		if(Yii::app()->user->checkAccess('privateUser') && $model->status=='active'){
			$temp = Loi::model()->findByAttributes(array('invitation_id'=>$model->id,'user_id'=>Yii::app()->user->id));
			if($temp==null){
				echo '<span class="rightLink">';
				echo CHtml::link(CHtml::encode('Submit LOI'), array('loi/submit','id'=>$model->id));
				echo '</span>';
			}
			else{
				echo '<span class="rightLink">';
				echo CHtml::link(CHtml::encode('View LOI'), array('loi/view','id'=>$model->id));
				echo '</span>';
			}

				echo '<span class="rightLink">';
				echo CHtml::link(CHtml::encode('View Eligibility Documents'), array('user/view','id'=>Yii::app()->user->id));
				echo '</span>';
		}
	echo '<br/><br/>';
	?>
	
	
	<div class="viewAll" style="border:none;height:20px;padding:0px">
		<div class="width30" style="width:70%;background-color:#dddddd;height:20px;text-align:center;font-weight:bold">
		Title
		</div>
		<div class="width30" style="width:15%;background-color:#eeeeee;height:20px;text-align:center;font-weight:bold">
		Letter of Intent
		</div>
		<div class="width30" style="width:15%;background-color:#dddddd;height:20px;text-align:center;font-weight:bold">
		Eligibility
		</div>
	</div>
		
	<?php

	if(isset($lois)){
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$lois,
			'summaryText'=>'',
			'itemView'=>'/loi/_viewLois',
		));
	}	
	echo '<br/>';
	echo $this->renderPartial('/loiAndEligibilityReceipt/_view',array('data'=>$loi));
	 
}

echo '</br>';

//BIDDINGDOCUMENTSBIDDINGDOCUMENTSBIDDINGDOCUMENTSBIDDINGDOCUMENTSBIDDINGDOCUMENTS
echo '<div class="stages"><a name="bd"><span class="stages">Bidding Documents</a></div>';
if(Yii::app()->user->checkAccess('bacSec')){
		echo '<span class="rightLink">';
		echo CHtml::link(CHtml::encode('Upload Documents'), array('updateBD','id'=>$model->id));
		echo '</span>';
}
echo '<br/>';
$criteria=new CDbCriteria();
$criteria->condition="id='$model->id'";
$result= BidDocs::model()->findAll($criteria);
if(count($result)!=0){
	echo "Download Bidding Documents <br>";
	foreach($result as $doc){
	$pdf=explode(".pdf",$doc->bidding_document);
	if($pdf[0]!="")echo '<a href="files/bd/'.$doc->bidding_document.'"> '.$pdf[0].'.pdf</a><br>';
	}
}
else{
	echo 'Bidding Documents Not Available';
}

//echo 'total document request: '.$model->total_document_request.'<br/><br/>';
echo '<br/><br/>';

//PRE-BIDCONFERENCEPRE-BIDCONFERENCEPRE-BIDCONFERENCEPRE-BIDCONFERENCEPRE-BIDCONFERENCE
echo '<div class="stages"><a name="pre-bid"><span class="stages">Pre-Bid Conference</a></div>';
	if(Yii::app()->user->checkAccess('bacSec')){
		echo '<span class="rightLink">';
		echo CHtml::link(CHtml::encode('Set Date'), array('preBidConference/update', 'id'=>$model->id, 'inv_creator_id'=>$bac->id));
		echo '</span>';
	} 
	echo '<br/><br/>';
if(isset($preBid->date_start)){
	echo $this->renderPartial('/preBidConference/_view',array('data'=>$preBid));
	echo '<br/>';
}

//ENVELOPESENVELOPESENVELOPESENVELOPESENVELOPESENVELOPESENVELOPESENVELOPES
echo '<div class="stages"><a name="envelope"><span class="stages">Technical and Financial Bid Evaluation</a></div>';
		if(Yii::app()->user->checkAccess('bacUser')){
		 	echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('Set Date'), array('bidEnvelopesOpening/update', 'id'=>$model->id));
			echo '</span>';
		 	echo '<span class="rightLink">';
		 	echo CHtml::link(CHtml::encode('Check bids'), array('bid/check', 'id'=>$model->id));
		 	echo '</span>';
		 	
		}
		
	if(Yii::app()->user->checkAccess('privateUser') && $model->status=='active'){
	$criteria=new CDbCriteria();
$criteria->condition="id='$model->id'";
$result= BidDocs::model()->findAll($criteria);
if(count($result)!=0){
	$temp = Bid::model()->findByAttributes(array('invitation_id'=>$model->id,'user_id'=>Yii::app()->user->id));
		if($temp===null){
			echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('Submit my bid'), array('bid/submit','id'=>$model->id));
			echo '</span>';
		}
		else{
			echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('View my bid'), array('bid/view','id'=>$model->id));
			echo '</span>';
		}
	}
}
	echo '<br/></br>';
if(isset($bidEnv->date_start)){
	if(isset($bids)){
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$bids,
			'summaryText'=>'',
			'itemView'=>'/bid/_viewBids',
		));
if(Yii::app()->user->checkAccess('bacSec')){
		if($model->status!="failed"){
			echo CHtml::link(CHtml::encode('Fail Bidding'), array('invitation/failBid','id'=>$model->id));
	}
	}
		echo "<br/>";
	}	
	echo $this->renderPartial('/bidEnvelopesOpening/_view',array('data'=>$bidEnv));
	echo '<br/>';
}

//BIDEVALUATIONBIDEVALUATIONBIDEVALUATIONBIDEVALUATIONBIDEVALUATIONBIDEVALUATION
echo '<div class="stages"><a name="bidEvaluation"><span class="stages">Selection of Lowest Calculated Bid</a></div>';
		if(Yii::app()->user->checkAccess('bacChair')){
		 	echo '<span class="rightLink">';
		 		echo CHtml::link(CHtml::encode('Set Date'), array('bidEvaluation/update', 'id'=>$model->id));
		 	echo '</span>';
		 	echo '<span class="rightLink">';
		 		echo CHtml::link(CHtml::encode('Update CCP'), array('bid/updateBidsCCP', 'id'=>$model->id));
		 	echo '</span>';
		}
	echo '<br/><br/>';
if(isset($bidEval->date_start)){
	if(isset($bids)){
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$bids,
			'itemView'=>'/bid/_viewBidsCCP',
		));
	}
	echo '<br/>';
	
	echo $this->renderPartial('/bidEvaluation/_view',array('data'=>$bidEval));
	echo '<br/>';
}

//POSTQUALIFICATIONPOSTQUALIFICATIONPOSTQUALIFICATIONPOSTQUALIFICATIONPOSTQUALIFICATION
echo '<div class="stages"><a name="postQualification"><span class="stages">Post-Qualification</a></div>';
		if(Yii::app()->user->checkAccess('bacChair')){
		 	echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('Set Date'), array('postQualification/update', 'id'=>$model->id));
			echo '</span>';
			echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('Update LCRB'), array('postQualification/updateLCRB', 'id'=>$model->id));
			echo '</span>';
		}
	echo '<br/><br/>';
if(isset($postQua->date_start)){
	if(isset($bids)){
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$bids,
			'summaryText'=>'',
			'itemView'=>'/postQualification/_viewBidsLCRB',
		));
			if(Yii::app()->user->checkAccess('bacChair')){
				if($model->status!="failed"){
					echo '<span class="rightLink">';
					echo CHtml::link(CHtml::encode('Fail Bidding'), array('invitation/failBid','id'=>$model->id));
					echo '<br/>';
				}
			}
	}

	echo $this->renderPartial('/postQualification/_view',array('data'=>$postQua));
	echo '<br/>';
}

//AWARDINGAWARDINGAWARDINGAWARDINGAWARDINGAWARDINGAWARDINGAWARDING

echo '<div class="stages"><a name="award"><span class="stages">Award</a></div>';
		if(Yii::app()->user->checkAccess('LCE')){
			echo '<span class="rightLink">';
			echo CHtml::link(CHtml::encode('Set Date'), array('awarding/update', 'id'=>$model->id));
			echo '</span>';
		}
	echo '<br/></br>';
if(isset($awarding->date_awarded)){
	echo $this->renderPartial('/awarding/_view',array('data'=>$awarding)); 
	echo '<br/>';
}

//NOTICE TO PROCEED
echo '<div class="stages"><a name="ntp"><span class="stages">Notice to Proceed</a></div>';
		if(Yii::app()->user->checkAccess('LCE')){
		 	echo '<span class="rightLink">';
		 	echo CHtml::link(CHtml::encode('Set Date'), array('ntp/update', 'id'=>$model->id));
		 	echo '</span>';
		}
	echo '<br/><br/>';

if(isset($ntp->date_of_notice)){
	
	echo $this->renderPartial('/ntp/_view',array('data'=>$ntp));
	echo '<br/>';
}
 
}


if(Yii::app()->user->checkAccess('LCE')){
	if($model->status != 'awarded'&& isset($model->awardee)){
	 	echo '<span class="awardLink">';
	 	echo CHtml::link(CHtml::encode('Post Award'), array('invitation/postAward', 'id'=>$model->id));
	 	echo '</span>';
	}
}



