<?php
/* @var $this TaxpayerController */
/* @var $model Taxpayer */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'My Profile'=>array('profile'),
	'Change Password',
);

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'changePassword-taxpayer-form',
	'enableAjaxValidation'=>true,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>
	
	<h4 style="text-align:center"><b>Change Password</b></h4>
	<!--START OF BASIC INFO-->
    <div class="view">
    	
    	<p class="note">Fields with <span class="required">*</span> are required.</p>
    	
    	<?php
		   	foreach (Yii::app()->user->getFlashes() as $key=>$message)
		   	{
		        echo "<div class='flash-$key'>$message</div>";
		    }
    	?>
    	
		<div class="row">
			<?php echo $form->labelEx($model, 'oldPassword'); ?>
			<?php echo $form->passwordField($model, 'oldPassword', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'oldPassword'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model, 'newPassword'); ?>
			<?php echo $form->passwordField($model, 'newPassword', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'newPassword'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model, 'rePassword'); ?>
			<?php echo $form->passwordField($model, 'rePassword', array('maxlength'=>32)); ?>
			<?php echo $form->error($model, 'rePassword'); ?>
		</div>
		
    </div>
	<!--END OF BASIC INFO-->





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Change Password' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
