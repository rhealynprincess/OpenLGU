<?php
/* @var $this BidController */
/* @var $model Bid */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bid-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>"multipart/form-data"),
)); ?>

	<?php echo $form->errorSummary($model);
		if(isset($error)){ 
			echo '<span class="error">'.$error.'</span>';
		} 
	?>

	<div class="row">
		<?php echo '<b>Organization</b>'; ?>
		<?php 
		$o = Organization::model()->findByPk($model->user_id);
		echo $o->name; ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	<?php
		echo $form->hiddenField($model,'id');
		/*	
		$pdf= explode(".pdf",$o->eligibility_doc_file_location );
		echo '<b>Eligibility bid</b> ';
		echo 'Current File: ';
		echo '<a href="files/eli/'.$o->eligibility_doc_file_location.'">('.$pdf[0].'.pdf)</a> ';
		echo '<br/>';
		//echo '<input type="file" name="filee" id="filee" required="required""/><br/>';
		echo $form->radioButtonList($modele, 'status', array('pass','fail', 'pending'), array());
		*/

		$pdf= explode(".pdf",$modelt->file_location );
		echo '<b>Technical bid</b><br/>';
		echo 'Current file: ';
		echo '<a href="files/bid/'.$modelt->file_location.'">('.$pdf[0].'.pdf)</a> ';
		echo '<br/>';
		//echo '<input type="file" name="filet" id="filet" required="required" /><br/>';
		echo $form->radioButtonList($modelt, 'status', array('PASS','FAIL', 'PENDING'), array());
				
		echo '<br />';

		$pdf= explode(".pdf",$modelf->file_location );
		echo '<b>Financial bid</b><br/>';
		echo 'Current file: ';
		echo '<a href="files/bid/'.$modelf->file_location.'">('.$pdf[0].'.pdf)</a> ';
		echo '<br/>';
		//echo '<input type="file" name="filef" id="filef" required="required" /><br/>';
		echo $form->radioButtonList($modelf, 'status', array('PASS','FAIL', 'PENDING'), array());
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
