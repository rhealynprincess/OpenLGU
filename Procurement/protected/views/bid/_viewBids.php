<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

	<div style="width:70%;margin-left:20%;">
		<table>
			<th>BAC Member</th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Technical</th><th>Financial</th>
		</table>
	</div>
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
	
<div class="view_user">
	<?php
	$criteria=new CDbCriteria();
	$criteria->condition="id='$data->id'";
	$checker_ids= EligibilityBid::model()->findAll($criteria);
	
	
	
	foreach($checker_ids as $check_id)
	{
					
	$criteria=new CDbCriteria();
	$criteria->condition="id='$check_id->checker'";
	$checker= User::model()->findByPk($check_id->checker);
	if( count($checker)!=0){	
	$fName = $checker->first_name.' '.strtoupper(substr($checker->middle_name,0,1)).'. '.$checker->last_name;
	echo $fName."<br>";
		}
		}

?>	
	</div>
	
	<div class="view2_2">
	
	<?php 
	/*
	//$ebS = EligibilityBid::model()->findByAttributes(array('id'=>$data->id));
	$criteria=new CDbCriteria();
	$criteria->condition="id='$data->id'";
	$ebS= EligibilityBid::model()->findAll($criteria);
	if(isset($org->eligibility_doc_file_location)){
		
		foreach($ebS as $eb){

			 
		if($eb->status=='pass'){
			echo '<span class="pass">PASS</span><br>';
		}	
		else if($eb->status=='fail'){
			echo '<span class="fail">FAIL</span><br>';
		}	
		else if($eb->status=='pending'){
			echo '<span class="pending">PENDING</span><br>';
		}
		else{
			echo '<span class="missing">MISSING</span><br>';
		}
		}
	}
	else{
		echo 'none';
	}

	*/?>
	</div> 
	<div class="view2_3">
	 
	<?php 
		$criteria=new CDbCriteria();
	$criteria->condition="id='$data->id'";
	$ebS= TechnicalBid::model()->findAll($criteria);

		foreach($ebS as $eb){
			if(isset($eb->file_location)){
		if($eb->status=='pass'){
			echo '<span class="pass">PASS</span><br>';
		}	
		else if($eb->status=='fail'){
			echo '<span class="fail">FAIL</span><br>';
		}	
		else if($eb->status=='pending'){
			echo '<span class="pending">PENDING</span><br>';
		}
		else{
			echo '<span class="missing">MISSING</span><br>';
		}
		}

		else{
		echo 'none';
		}
	}
	
	?>
	</div>
	<div class="view2_4">
	
	<?php 
		$criteria=new CDbCriteria();
	$criteria->condition="id='$data->id'";
	$ebS= FinancialBid::model()->findAll($criteria);
	
	
		foreach($ebS as $eb){
		if(isset($eb->file_location)){
			if($eb->status=='pass'){
				echo '<span class="pass">PASS</span><br>';
			}	
			else if($eb->status=='fail'){
				echo '<span class="fail">FAIL</span><br>';
			}	
			else if($eb->status=='pending'){
				echo '<span class="pending">PENDING</span><br>';
			}
			else{
				echo '<span class="missing">MISSING</span><br>';
			}
		}

		else{
			echo 'none';
		}
	}
	?>
	</div>
		<?php
	if(Yii::app()->user->checkAccess('bacSec')){
			echo CHtml::link(CHtml::encode('View'), array('bid/viewDocs','id'=>$data->id));
	}
		?>
</div>
