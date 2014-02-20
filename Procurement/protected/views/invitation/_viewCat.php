<?php
/* @var $this InvitationController */
/* @var $data Invitation */
?>


	<?php
		
		try{
			$invs = Invitation::model()->countByAttributes(array('category'=>$data,'status'=>'active'));
			if(isset($invs)){
				if($invs!=0)
				{
					echo '<div class="viewCat">';
					echo CHtml::link(CHtml::encode($data), array('indexCat', 'cat'=>$data));
					
					echo '<span style="float:right">';
					echo $invs;
					echo '</span>';
					echo '</div>';
				}

				else{
					echo '<div class="viewCat">';
					echo '<span class="dim">'.$data.'</span>';
					
					echo '<span style="float:right">';
					echo $invs;
					echo '</span>';
					echo '</div>';
				}
					
			}
			else{
				//echo $data;
			}
		}
		
		catch(Exception $e){
			echo $e;
		}
	?>
