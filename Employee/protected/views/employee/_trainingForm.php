<?php
/**
 * Employee Training information form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php
$training = (!isset($_GET['row'])) ? new EmployeeTraining : EmployeeTraining::model()->findByPk($_GET['row']);

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'training-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
      
     <div class="row">
        <?php echo $form->labelEx($training, 'program_title'); ?>
        <?php echo $form->textField($training, 'program_title'); ?>
        <?php echo $form->error($training, 'program_title'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($training, 'from_date'); ?>
        <?php
            $from = ($training->from_date) ? date('m/d/Y', strtotime($training->from_date)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($training, 'from_date'),
                'value'=>$from,
                'options'=>array(
                    'changeYear'=>true,
                    'minDate'=>'-65Y',
                    'maxDate'=>'0',
                )
            ));
        ?>
        <?php echo $form->error($training, 'from_date'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($training, 'to_date'); ?>
        <?php
            $to = ($training->to_date) ? date('m/d/Y', strtotime($training->to_date)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($training, 'to_date'),
                'value'=>$to,
                'options'=>array(
                    'changeYear'=>true,
                    'yearRange'=>'-65:+0',
                )
            ));
        ?>
        <?php echo $form->error($training, 'to_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($training, 'no_of_hours'); ?>
        <?php echo $form->textField($training, 'no_of_hours'); ?>
        <?php echo $form->error($training, 'no_of_hours'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($training, 'sponsor'); ?>
        <?php echo $form->textField($training, 'sponsor'); ?>
        <?php echo $form->error($training, 'sponsor'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($training, 'attachment'); ?>        
        <?php echo $form->dropDownList($training, 'attachment', $model->getAttachments(), array('empty'=>'NONE')); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($training->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->