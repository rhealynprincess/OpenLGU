
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lgu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model);
		if(isset($error)){ 
			echo '<span class="error">'.$error.'</span>';
		}
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'acronym'); ?>
		<?php echo $form->textField($model,'acronym'); ?>
		<?php echo $form->error($model,'acronym'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'tax_id_number'); ?>
		<?php echo $form->textField($model,'tax_id_number'); ?>
		<?php echo $form->error($model,'tax_id_number'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website'); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model2,'government_branch'); ?>
		<?php echo $form->textField($model2,'government_branch'); ?>
		<?php echo $form->error($model2,'government_branch'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model2,'type'); ?>
		<?php echo $form->textField($model2,'type'); ?>
		<?php echo $form->error($model2,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'sector'); ?>
		<?php echo $form->textField($model2,'sector'); ?>
		<?php echo $form->error($model2,'sector'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model3,'population'); ?>
		<?php echo $form->textField($model3,'population'); ?>
		<?php echo $form->error($model3,'population'); ?>
	</div>
	
	<span class="error">
		<?php 
			if(isset($error)){
				if($error=='confirmPassword'){
					echo 'passwords do not match';
				}
				if($error=='usernameExist'){
					echo 'username already exist';
				};
			}
		?>
	</span>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
