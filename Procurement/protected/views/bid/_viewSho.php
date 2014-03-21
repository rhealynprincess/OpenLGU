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
	
	<div class="view2_2">
	Eligibility:
	<?php 
	$criteria= new CDbCriteria();
	$criteria->condition="id='$data->id'";
	$Eb = EligibilityBid::model()->findAll($criteria);
		
	if(isset($org->eligibility_doc_file_location)){
		foreach($Eb as $eb){
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
		}
	}
	else{
		echo 'none';
	}
	?>
	</div> 
	
</div>
