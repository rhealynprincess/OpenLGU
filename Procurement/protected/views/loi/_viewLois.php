<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

<div class="view4">
	<div class="view4_1">
		<?php 
		
		$orgId = User::model()->findByPk($data->user_id)->organization_id;
		echo '<b>';
		echo Organization::model()->findByPk($orgId)->name;
		echo '</b>';
		?>
	</div>
	<div class="view4_2">
	<?php 
	if(isset($data->file_location)){
			echo '<span class="missing">SUBMITTED</span>';
	}
	else{
		echo 'none';
	}
	?>
	
	</div>
	<div class="view4_3">
	<?php 
	$ebt = Bid::model()->findByAttributes(array('user_id'=>$data->user_id,'invitation_id'=>$data->invitation_id));
	
	if(isset($ebt)){
	$org = Organization::model()->findByPk($ebt->user_id);
	$criteria=new CDbCriteria();
	$criteria->condition="id='$ebt->id'";
	$eb= EligibilityBid::model()->find($criteria);	
	
	
	if(isset($org->eligibility_doc_file_location)){
		//echo $eb->file_location;
	//foreach($ebS as $eb){		
	if($eb->status=='pass'){
			echo '<span class="pass">PASS</span>';
		}	
		else if($eb->status=='fail'){
			echo '<span class="fail">FAIL</span>';
		}	
		else if($eb->status=='pending'){
			echo '<span class="pending">PENDING</span>';
		}
		else{
			echo '<span class="missing">MISSING</span>';
		}
	//}

	}
	else{
		echo 'none';
	}
	}
	?>
	</div>
</div>
