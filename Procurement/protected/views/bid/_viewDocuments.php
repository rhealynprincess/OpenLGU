<?php
/* @var $this BidController */
/* @var $model Bid */
/* @var $form CActiveForm */
?>



	
	<?php
	
			/*	
		$pdf= explode(".pdf",$modele->file_location );
		echo '<b>Eligibility bid</b><br/>';
		echo 'Current File: ';
		echo '<a href="files/eli/'.$modele->file_location.'">('.$pdf[0].'.pdf)</a> ';
		echo '<br/>';
		//echo '<input type="file" name="filee" id="filee" required="required""/><br/>';
		//echo $form->radioButtonList($modele, 'status', array('pass','fail', 'pending'), array());
		*/

		$pdf= explode(".pdf",$modelt->file_location );
		echo '<b>Technical bid</b><br/>';
		echo 'Current file: ';
		echo '<a href="files/bid/'.$modelt->file_location.'">('.$pdf[0].'.pdf)</a> ';
		echo '<br/>';
		//echo '<input type="file" name="filet" id="filet" required="required" /><br/>';
		//echo $form->radioButtonList($modelt, 'status', array('pass','fail', 'pending'), array());
		
		$pdf= explode(".pdf",$modelf->file_location );
		echo '<b>Financial bid</b><br/>';
		echo 'Current file: ';
		echo '<a href="files/bid/'.$modelf->file_location.'">('.$pdf[0].'.pdf)</a> ';
		echo '<br/>';
		//echo '<input type="file" name="filef" id="filef" required="required" /><br/>';
		//echo $form->radioButtonList($modelf, 'status', array('pass','fail', 'pending'), array());
	?>
	



