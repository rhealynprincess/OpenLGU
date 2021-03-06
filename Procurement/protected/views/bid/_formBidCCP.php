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

	<!--<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $model->user_id; ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>-->
	<?php
		$criteria=new CDbCriteria();
		$criteria->condition="id=".$model->user_id;
		$result=User::model()->find($criteria);
	?>
	
	<div class="row"><?php
	$fName = $result->first_name.' '.strtoupper(substr($result->middle_name,0,1)).'. '.$result->last_name;?>
	 <?php echo $form->label($model,'user_id'); ?>
		<?php echo $fName; ?>
		<?php //echo $form->error($model,'user_id'); ?>
	</div>

	<?php
		$org_id=$result->organization;
		$criteria=new CDbCriteria();
		$criteria->condition="id=".$model->user_id;
		$result=Organization::model()->find($criteria);
	?>

	<div class="row">
	 <?php echo $form->label($model,'organization'); ?>
		<?php echo $result->name; ?>
		<?php //echo $form->error($model,'user_id'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->label($model,'correct_calculated_price'); ?>
		<?php echo $form->textField($model,'correct_calculated_price'); ?>
		<?php echo $form->error($model,'correct_calculated_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
