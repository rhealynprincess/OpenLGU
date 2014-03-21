<?php
/* @var $this ProjectImplementorController */
/* @var $model ProjectImplementor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'Project/Program_no'); ?>
		<?php echo $form->textField($model,'project_program_no'); ?>
	</div>-->
<!--
	<div class="row">
		<?php echo $form->label($model,'Project/Program_title'); ?>
		<?php echo $form->textField($model,'project_program_title',array('size'=>60,'maxlength'=>200)); ?>
	</div>
-->

	<div class="row">
		<?php echo $form->label($model,'cost'); ?>
		<?php echo $form->textField($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
	<?php echo $form->dropDownList($model,'location',CHtml::listData(Location::model()->findAll(),'name','name'), array('empty'=>'--select--')); ?>
	</div>

	<!--
	<div class="row">
		<?php echo $form->label($model,'source_of_fund'); ?>
		<?php echo $form->textField($model,'source_of_fund',array('size'=>60,'maxlength'=>100)); ?>
	</div>-->
	
		<div class="row">
		<?php echo $form->label($model,'date_started'); ?>
		<?php //echo $form->textField($model,'date_started'); 
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'language'=>'',
                'model'=>$model,                                // Model object
                'attribute'=>'date_started', // Attribute                     
                'options'=>array(
											'dateFormat'=>	'yy-mm-dd',
										),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'dateFormat'=>	'yy-mm-dd') // HTML options
        ));
			?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_completed'); ?>
		<?php //echo $form->textField($model,'date_completed'); 
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'language'=>'',
                'model'=>$model,                                // Model object
                'attribute'=>'date_completed', // Attribute                     
                'options'=>array(
											'dateFormat'=>	'yy-mm-dd',
										),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'dateFormat'=>	'yy-mm-dd') // HTML options
        ));
?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'due_date'); ?>
		<?php //echo $form->textField($model,'date_completed'); 
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'language'=>'',
                'model'=>$model,                                // Model object
                'attribute'=>'due_date', // Attribute                     
                'options'=>array(
											'dateFormat'=>	'yy-mm-dd',
										),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'dateFormat'=>	'yy-mm-dd') // HTML options
        ));
?>
	</div>

		<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contractor'); ?>
		<?php echo $form->dropDownList($model,'contractor',CHtml::listData(Contractor::model()->findAll(),'name','name'), array('empty'=>'--select--')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sector'); ?>
		<?php echo $form->textField($model,'sector',array('size'=>60,'maxlength'=>100)); ?>
	</div>
	

	<div class="row">
		<?php echo $form->label($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks',array('size'=>60,'maxlength'=>100)); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
