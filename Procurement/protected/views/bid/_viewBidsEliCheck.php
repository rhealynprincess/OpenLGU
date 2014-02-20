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
	$criteria=new CDbCriteria();
	$criteria->condition="id='$data->id'";
	$EB= EligibilityBid::model()->find($criteria);	
	//echo '<a href="files/bid/'.$eb->file_location.'">('.$eb->file_location.')</a> ';
	//foreach($EB as $eb){
	echo $EB->status;
	//}
	?>
	<?php 
	echo '<br/>';
	echo CHtml::link(CHtml::encode('Check'), array('checkBidEli','id'=>$data->id, 'user_id'=>$data->user_id));
	?>
	
</div>
