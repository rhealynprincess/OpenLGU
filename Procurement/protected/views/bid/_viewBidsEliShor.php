<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

<div class="view">

	<b>Bidder: </b>
	<?php 
	$orgId = User::model()->findByPk($data->user_id)->organization_id;
	echo Organization::model()->findByPk($orgId)->name;
	?>
	<br/>
	<b>Eligibility: </b>
	<?php 
	$criteria= new CDbCriteria();
	$criteria->condition="id='$data->id'";
	$Eb = EligibilityBid::model()->findAll($criteria);
	//echo '<a href="files/bid/'.$eb->file_location.'">('.$eb->file_location.')</a> ';
	foreach($Eb as $eb){
	echo $eb->status;
	}
	?>
	<?php 
	echo '<br/>';
	if($data->status=='shortlisted')
	echo CHtml::link(CHtml::encode('Remove from Shortlist'), array('removeFromShortlist','id'=>$data->id));
	else
	echo CHtml::link(CHtml::encode('Add to Shortlist'), array('addToShortlist','id'=>$data->id));
	?>
	
</div>
