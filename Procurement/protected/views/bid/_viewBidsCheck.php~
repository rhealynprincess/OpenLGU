<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

<div class="viewBid">
	<div class="viewBid_Check">
		<?php 
		$org = Organization::model()->findByPk($data->user_id);
		$orgId = $org->id;
		echo '<b>';
		echo Organization::model()->findByPk($orgId)->name;
		echo '</b>';
		?>
	</div>

	<div class="viewBid_1">
	<b>Technical bid: </b><br>
	<?php 
	$criteria= new CDbCriteria();
	$criteria->condition="id='$data->id'";
	$ebS = TechnicalBid::model()->findAll($criteria);
	foreach($ebS as $eb){
	if(isset($eb->file_location)){
		if($eb->checker==Yii::app()->user->id){
		if($eb->status=='pass'){
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="pass">PASS</span><br>';
		}	
		else if($eb->status=='fail'){
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fail">FAIL</span><br>';
		}	
		else if($eb->status=='pending'){
			echo '&nbsp;&nbsp;&nbsp;&nbsp;<span class="pending">PENDING</span><br>';
		}
		else{
			echo '<span class="missing">MISSING</span><br>';
		}
		}
	}
	else{
		echo 'none';
	}
	}
	?>
	</div>
	<div class="viewBid_2">
	<b>Financial bid:</b><br>
	<?php 
	$ebS = FinancialBid::model()->findAll($criteria);
	foreach($ebS as $eb){
	if(isset($eb->file_location)){
		if($eb->checker==Yii::app()->user->id){
		if($eb->status=='pass'){
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="pass">PASS</span><br>';
		}	
		else if($eb->status=='fail'){
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fail">FAIL</span><br>';
		}	
		else if($eb->status=='pending'){
			echo '&nbsp;&nbsp;&nbsp;&nbsp;<span class="pending">PENDING</span><br>';
		}
		else{
			echo '<span class="missing">MISSING</span><br>';
		}
		}
	}
	else{
		echo 'none';
	}
	}
	?>
	</div>

	<div class="viewBid_2">
	<br>
	<?php 
	$is_checked_by_user=0;
	$criteria= new CDbCriteria();
	$criteria->condition="id='$data->id'";
	$criteria->order="checker";
	$Eb = EligibilityBid::model()->findAll($criteria);
	foreach($Eb as $eb){
		if($eb->checker==Yii::app()->user->id){ echo CHtml::link(CHtml::encode('Check'), array('checkBid','id'=>$eb->id, 'checker'=>$eb->checker))."<br>";
		$is_checked_by_user=1;
		}
		}
	if($is_checked_by_user==0){
		
		echo CHtml::link(CHtml::encode('Check'), array('checkBid','id'=>$eb->id, 'checker'=>Yii::app()->user->id));
		
	}
	?>
	</div>

		
</div>
	
