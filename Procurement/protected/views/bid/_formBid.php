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
		<?php echo $form->label($model,'invitation_id'); ?>
		<?php echo $form->hiddenField($model,'invitation_id');
			   echo Invitation::model()->findByPk($model->invitation_id)->title; ?>
		<?php echo $form->error($model,'invitation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo Yii::app()->user->full_name; ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	<?php
		$org = Organization::model()->findByPk($model->user_id);
		echo '<b>Eligibility Bid</b><br/>';
		echo '<b>Current File: </b>';
		echo $org->eligibility_doc_file_location;
		echo '<br/>';
		echo '<br/><br/>';

		echo '<b>Technical Bid</b><br/>';
		echo '<b>Current File: </b>';
		echo $modelt->file_location;
		echo '<br/>';
		echo '<input accept="application/pdf" type="file" name="filet" id="filet" required="required" /><br/>';
		echo '<br/><br/>';

		echo '<b>Financial Bid</b><br/>';
		echo '<b>Current File: <b>';
		echo $modelf->file_location;
		echo '<br/>';
		echo '<input accept="application/pdf" type="file" name="filef" id="filef" required="required" /><br/>';
		echo '<br/><br/>';

	
	?>
	<?php
	$inv = Invitation::model()->findByPk($model->invitation_id);
	echo "ABC: ".$inv->abc;
	
	
	?>
	<div class="row">
		<?php echo $form->label($model,'correct_calculated_price'); ?>
		<?php echo $form->numberField($model,'correct_calculated_price', array('max'=>$inv->abc)); ?>
		<?php echo $form->error($model,'correct_calculated_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
