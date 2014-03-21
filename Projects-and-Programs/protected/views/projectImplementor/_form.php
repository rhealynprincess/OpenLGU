<?php
/* @var $this ProjectImplementorController */
/* @var $model ProjectImplementor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-implementor-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
			'enctype'=>'multipart/form-data',
			),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'Project/Program_no'); ?>
		<?php echo $form->textField($model,'project_program_no'); ?>
		<?php echo $form->error($model,'project_program_no'); ?>
	</div>-->
	
	<div class="row">
        <?php echo $form->labelEx($model,'image'); ?>
        <?php echo CHtml::activeFileField($model, 'image'); ?> 
        <?php echo $form->error($model,'image'); ?>
</div>
	<?php if($model->isNewRecord!='1'){ ?>
<div class="row">
     <?php echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$model->image,"image",array("width"=>200)); ?>
</div>
<?php }?>

	<div class="row">
		<?php echo $form->labelEx($model,'Project_Program_title'); ?>
		<?php echo $form->textField($model,'project_program_title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'project_program_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost'); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->dropDownList($model,'location',CHtml::listData(Location::model()->findAll(),'name','name'), array('empty'=>'--select--')); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source_of_fund'); ?>
		<?php echo $form->textField($model,'source_of_fund',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'source_of_fund'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_started'); ?>
		<?php 
			//echo $form->textField($model,'date_started'); 
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'date_started',
                'language'=>'',
                'model'=>$model,                                // Model object
                'attribute'=>'date_started', // Attribute                     
                'options'=>array(
											'onSelect'=>"js:function(dateText,inst){
								
														var complete=document.getElementById('date_completed');
												complete.disabled=false;
												complete.value='';
													var due=document.getElementById('due_date');
												due.disabled=false;
												due.value='';
													
											}",
											'dateFormat'=>	'yy-mm-dd',
										),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true) // HTML options
        ));
			?>
		<?php //echo $form->textField($model,'date_started',array('id'=>'date_started')); ?>
		<?php echo $form->error($model,'date_started'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_completed'); ?>
		<?php 
				// echo $form->textField($model,'date_completed'); 
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'date_completed',                
								'language'=>'',
                'model'=>$model,
                'attribute'=>'date_completed', // Attribute                     
                'options'=>array(
										
											'dateFormat'=>	'yy-mm-dd',									
										),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'disabled'=>'disabled','value'=>'select start date') // HTML options
        ));
		?>
		<?php echo $form->error($model,'date_completed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'due_date'); ?>
		<?php                    
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'name'=>'due_date',
								'language'=>'',
                'model'=>$model,                                // Model object
                'attribute'=>'due_date', // Attribute                     
                'options'=>array(
											'dateFormat'=>	'yy-mm-dd',									
												),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'disabled'=>'disabled','value'=>'select start date') // HTML options
        ));         
        ?> 
		<?php echo $form->error($model,'due_date'); ?>
	</div>

		<div class="row">
		<?php echo $form->textField($model,'status', array('value'=>'completed', 'hidden'=>'hidden')); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'contractor'); ?>
		<?php echo $form->dropDownList($model,'contractor',CHtml::listData(Contractor::model()->findAll(),'name','name'), array('empty'=>'--select--')); ?>
		<?php echo $form->error($model,'contractor'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'sector'); ?>
		<?php echo $form->textField($model,'sector',array('size'=>60,'maxlength'=>100, 'value'=>Yii::app()->user->getState("user_sector"), 'hidden'=>'hidden')); ?>
		<?php //echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
