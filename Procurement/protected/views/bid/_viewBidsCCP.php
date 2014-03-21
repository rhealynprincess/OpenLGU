<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

		<?php 
		$lcb = Invitation::model()->findByPk($data->invitation_id)->lcb;
		if($lcb == $data->user_id){
			echo '<div class="lcb">';
		}
		else
			echo '<div class="view3">';
		?>
	
	<div class="view3_1">
		<b>
		<?php 
		$orgId = User::model()->findByPk($data->user_id)->organization_id;
			echo Organization::model()->findByPk($orgId)->name;
		?>
		</b>
	</div>
	<div class="view3_2">
		
		Correct Calculated Price:
		<?php
		
		if($lcb == $data->user_id){
			echo 'Php '; 
			echo '<b>';
			echo Yii::app()->format->formatNumber($data->correct_calculated_price);
			echo '</b>';
			}
		else{
			echo 'Php '; 
			echo '<b>';
			echo Yii::app()->format->formatNumber($data->correct_calculated_price);
			echo '</b>';
		}


			?>
		
	</div>
</div>
