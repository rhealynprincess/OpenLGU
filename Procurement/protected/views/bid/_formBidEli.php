<?php
/* @var $this LoiController */
/* @var $model Loi */
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
		echo '<b>Eligibility bid</b><br/>';
		echo 'Current File: ';
		
		$result=Organization::model()->findByPk($model->user_id);		
		echo $result->eligibility_doc_file_location;
		echo '<br/>';
		echo '<input accept="application/pdf" type="file" name="file" id="file" required="required""/><br/>';
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
