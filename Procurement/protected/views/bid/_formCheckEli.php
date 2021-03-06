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
		<?php 
		$org = Organization::model()->findByPk($model->user_id);
		echo '<b>Organization: </b>'.$org->name;
			?>
	</div>
	<?php
		echo $form->hiddenField($model,'id');
	
		echo '<b>Eligibility bid</b><br/>';
		echo '<b>Current File: </b>';
		if(isset($org))
		echo 'view (<a href="files/bid/'.$org->eligibility_doc_file_location.'">'.$org->eligibility_doc_file_location.'</a>)';
			echo '<br/>';
		//echo '<input type="file" name="filee" id="filee" required="required""/><br/>';
		echo $form->radioButtonList($modele, 'status', array('PASS','FAIL'), array());
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
