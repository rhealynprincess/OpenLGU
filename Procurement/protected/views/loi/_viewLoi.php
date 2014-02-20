<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>

<div class="view5">
	<div class="view5_1">
		<?php 
		$orgId = User::model()->findByPk($data->user_id)->organization_id;
		echo '<b>';
		echo Organization::model()->findByPk($orgId)->name;
		echo '</b>';
		?>
	</div>
	<div class="view5_2">
	<?php 
	if(isset($data->file_location)){
		echo '<a href="files/loi/'.$data->file_location.'">('.$data->file_location.')</a> ';
	}
	else{
		echo 'none';
	}
	?>
	
	</div>
	
</div>