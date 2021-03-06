<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

<div class="view2">
	<div class="view2_1">
		<?php 
		$org = Organization::model()->findByPk($data->user_id);
		$orgId = $org->id;
		echo '<b>';
		echo Organization::model()->findByPk($orgId)->name;
		echo '</b>';
		?>
	</div>
	
	<div class="view2_2" style="width:44%">
		<b>Correct Calculated Price: </b>
		<?php 
		echo $data->correct_calculated_price;
		?>
	</div> 
	
	<div class="view2_4">
		<?php 
	$inv= Invitation::model()->findByPk($data->invitation_id);
	
	if($inv->classification=="Consulting Services"){
			echo CHtml::link(CHtml::encode('Set as HRB'), array('setAsLcb','id'=>$data->user_id,'inv_id'=>$data->invitation_id));
	}
	else{
		echo CHtml::link(CHtml::encode('Set as LCB'), array('setAsLcb','id'=>$data->user_id,'inv_id'=>$data->invitation_id));
	}
		?>
	</div>
	
	<div class="view2_5">
		<?php 
		//echo CHtml::link(CHtml::encode('Update'), array('update','id'=>$data->id));
		?>
	</div>
</div>	
	
