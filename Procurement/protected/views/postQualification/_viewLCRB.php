<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

<div class="viewLCRB">
	<div class="viewLCRB_1">
		<?php 
		$org = Organization::model()->findByPk($data->user_id);
		$orgId = $org->id;
		echo '<b>';
		echo Organization::model()->findByPk($orgId)->name;
		echo '</b>';
		?>
	</div>
	
	<div class="viewLCRB_2" style="width:44%">
		<b>CCP: </b>
		<?php 
		echo $data->correct_calculated_price;
		?>
	</div> 
	
	<div class="viewLCRB_3">
		
		<?php
		$inv= Invitation::model()->findByPk($data->invitation_id);
	
	if($inv->classification=="Consulting Services"){
 
			echo CHtml::link(CHtml::encode('Set as HRRB'), array('setAsLcrb','id'=>$data->user_id,'inv_id'=>$data->invitation_id));
	}
	else{
		
			echo CHtml::link(CHtml::encode('Set as LCRB'), array('setAsLcrb','id'=>$data->user_id,'inv_id'=>$data->invitation_id));
	}
		?>
	</div>
	
	<div class="viewLCRB_4">
		<?php 
		//echo CHtml::link(CHtml::encode('Fail'), array('failLCB','id'=>$data->id));
		?>
	</div>
</div>	
	
