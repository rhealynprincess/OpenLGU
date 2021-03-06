<?php
/* @var $this InvitationController */
/* @var $model Invitation */
/* @var $form CActiveForm */
?>

<?php 
	$options = new OptionRecord();
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invitation-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>"multipart/form-data"),
)); ?>


	<?php echo $form->errorSummary($model);
		if(isset($error)){ 
			echo '<span class="error">'.$error.'</span>';
		}

		//echo '<input type="file" name="file" id="file" />'; 
	?>
	<table>
		<tr>
		<td>
		<?php echo $form->label($model,'title'); ?>
		</td><td>
		<?php echo $form->textField($model,'title',array('autofocus'=>'true','placeholder'=>'Title','required'=>'required')); ?>
		<?php echo $form->error($model,'title'); ?>
		</td>
		</tr>
		
		<tr><td>
		<?php echo $form->label($model,'procuring_entity'); ?>
		</td><td>
		<?php echo $form->textField($model,'procuring_entity',array('required'=>'required')); ?>
		<?php echo $form->error($model,'procuring_entity'); ?>
		</td></tr>

		<tr><td>
		<?php echo $form->label($model,'procurement_mode'); ?>
		</td><td>
		<?php echo $model->procurement_mode;?>
		<?php echo $form->error($model,'procurement_mode'); ?>
		</td></tr>
		
		<tr><td>
		<?php echo $form->label($model,'classification'); ?>
		</td><td>
		<?php echo $form->dropDownList($model,'classification',$options->getClassifications()); ?>
		<?php echo $form->error($model,'classification'); ?>
		</td></tr>
		
		<tr><td>
		<?php echo $form->label($model,'category'); ?>
		</td><td>
		<?php echo $form->dropDownList($model,'category',$options->getBusinessCategories()); ?>
		<?php echo $form->error($model,'category'); ?>
		</td></tr>
		
		<tr><td>
		<?php echo $form->label($model,'abc'); ?>
		</td><td>
		<?php echo $form->numberField($model,'abc'); ?>
		<?php echo $form->error($model,'abc'); ?>
		</td></tr>

		<tr><td>
		<?php echo $form->label($model,'source_of_fund'); ?>
		</td><td>
		<?php echo $form->textField($model,'source_of_fund'); ?>
		<?php echo $form->error($model,'source_of_fund'); ?>
		</td></tr>
		
		<tr><td>
  		<?php echo $form->labelEx($model,'contract_duration'); ?>
		</td><td>
		<?php echo $form->textField($model,'contract_duration'); ?>
		<?php echo $form->error($model,'contract_duration'); ?>
		</td></tr>
		
		<tr><td>
		<?php echo $form->labelEx($model,'description'); ?>
		</td><td>
		<?php echo $form->textArea($model,'description', array('maxlength' => 3000, 'rows' => 8, 'cols' => 70)); ?>
		<?php echo $form->error($model,'description'); ?>
		</td></tr>
		
		<!-- 
		<tr><td>
		<?php echo $form->labelEx($model,'date_closing'); ?>
		</td><td>
		<?php echo $form->dateField($model,'date_closing',array('required'=>'required')); ?>
		<?php echo $form->error($model,'date_closing'); ?>
		</td></tr>
		 -->
		
		<tr>
			<td><?php echo $form->label($model,'date_closing'); ?></td>
			<td>
				<table style="width:300px">
					<tr>
					<td>
					<?php 
					$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
						'id'=>'date_closing',
						'model'=>$model,
						'attribute'=>'date_closing',
						'name'=>'date_closing',
						'htmlOptions'=>array('required'=>'required'),
					)); 
					$this->endWidget();
					?>
		
					</td><td>
					<?php
					echo '<input type="time" name="time_closing" value="'.$model->time_closing.'"/>'?>
					<?php echo $form->error($model,'time_closing'); ?>
					</td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td><?php echo $form->label($model,'date_opening'); ?></td>
			<td>
				<table style="width:300px">
					<tr>
					<td>
					<?php 
					$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
						'id'=>'date_opening',
						'model'=>$model,
						'attribute'=>'date_opening',
						'name'=>'date_opening',
						'htmlOptions'=>array('required'=>'required'),
					)); 
					$this->endWidget();
					?>
		
					</td><td>
					<?php
					echo '<input type="time" name="time_opening" value="'.$model->time_opening.'"/>'?>
					<?php echo $form->error($model,'time_opening'); ?>
					</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->label($model,'prebid_date'); ?></td>
			<td>
				<table style="width:300px">
					<tr>
					<td>
					<?php 
					$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
						'id'=>'prebid_date',
						'model'=>$model,
						'attribute'=>'prebid_date',
						'name'=>'prebid_date',
						'htmlOptions'=>array('required'=>'required'),
					)); 
					$this->endWidget();
					?>
		
					</td><td>
					<?php
					echo '<input type="time" name="prebid_time" value="'.$model->time_opening.'"/>'?>
					<?php echo $form->error($model,'prebid_time'); ?>
					</td>
					</tr>
				</table>
			</td>
		</tr>
		

		<tr><td>
		<?php echo $form->labelEx($model,'created_by'); ?>
		</td><td>
		<?php echo Yii::app()->user->full_name;?>
		<?php //echo UserBac::model()-findByPk($model->created_by)->first_name;	?>
		<?php echo $form->error($model,'created_by'); ?>
		</td></tr>

		<tr><td>
		<?php echo $form->labelEx($model,'area_of_delivery'); ?>
		</td><td>
		<?php echo $form->textField($model,'area_of_delivery'); ?>
		<?php echo $form->error($model,'area_of_delivery'); ?>
		</td></tr>

		<tr><td>
		</td><td>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</td></tr>

	</table>
	

<?php $this->endWidget(); ?>

</div><!-- form -->
