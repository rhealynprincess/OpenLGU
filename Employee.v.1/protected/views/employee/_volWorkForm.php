<?php
/**
 * Employee Voluntary Work information form.
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
$volwork = (!isset($_GET['row'])) ? new EmployeeVolWork : EmployeeVolWork::model()->findByPk($_GET['row']);

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'volwork-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
     
     <div class="row">
        <?php echo $form->labelEx($volwork, 'org_name_address'); ?>
        <?php echo $form->textField($volwork, 'org_name_address'); ?>
        <?php echo $form->error($volwork, 'org_name_address'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($volwork, 'from_date'); ?>
        <?php
            $from = ($volwork->from_date) ? date('m/d/Y', strtotime($volwork->from_date)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($volwork, 'from_date'),
                'value'=>$from,
                'options'=>array(
                    'changeYear'=>true,
                    'minDate'=>'-65Y',
                    'maxDate'=>'0',
                )
            ));
        ?>
        <?php echo $form->error($volwork, 'from_date'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($volwork, 'to_date'); ?>
        <?php
            $to = ($volwork->to_date) ? date('m/d/Y', strtotime($volwork->to_date)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($volwork, 'to_date'),
                'value'=>$to,
                'options'=>array(
                    'changeYear'=>true,
                    'minDate'=>'-65Y',
                    'maxDate'=>'0',
                )
            ));
        ?>
        <?php echo $form->error($volwork, 'to_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($volwork, 'no_of_hours'); ?>
        <?php echo $form->textField($volwork, 'no_of_hours'); ?>
        <?php echo $form->error($volwork, 'no_of_hours'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($volwork, 'position_title'); ?>
        <?php echo $form->textField($volwork, 'position_title'); ?>
        <?php echo $form->error($volwork, 'position_title'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($volwork, 'attachment'); ?>
        <?php echo $form->dropDownList($volwork, 'attachment', $model->getAttachments(), array('empty'=>'NONE')); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($volwork->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->