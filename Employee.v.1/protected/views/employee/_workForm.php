<?php
/**
 * Employee Work information form.
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
$work =  (!isset($_GET['row'])) ? new EmployeeWork : EmployeeWork::model()->findByPk($_GET['row']);

$salGrade = array();
for ($i=1; $i<=33; $i++) {
    $salGrade[$i] = $i;
}

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'work-form', 
    'enableClientValidation'=>true, 
    'clientOptions'=>array('validateOnSubmit'=>true), 
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
      
     <div class="row">
        <?php echo $form->labelEx($work, 'position_title'); ?>
        <?php echo $form->textField($work, 'position_title'); ?>
        <?php echo $form->error($work, 'position_title'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($work, 'company_name'); ?>
        <?php echo $form->textField($work, 'company_name'); ?>
        <?php echo $form->error($work, 'company_name'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($work, 'from_date'); ?>
        <?php
            $from = ($work->from_date) ? date('m/d/Y', strtotime($work->from_date)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($work, 'from_date'), 
                'value'=>$from, 
                'options'=>array(
                    'changeYear'=>true, 
                    'minDate'=>'-65Y', 
                    'maxDate'=>'0', 
                )
            ));
        ?>
        <?php echo $form->error($work, 'from_date'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($work, 'to_date'); ?>
        <?php
            $to = ($work->to_date) ?date('m/d/Y', strtotime($work->to_date)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($work, 'to_date'), 
                'value'=>$to, 
                'options'=>array(
                    'changeYear'=>true, 
                    'minDate'=>'-65Y', 
                    'maxDate'=>'0', 
                )
            ));
        ?>
        <?php echo $form->error($work, 'to_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($work, 'monthly_salary'); ?>
        <?php echo $form->textField($work, 'monthly_salary'); ?>
        <?php echo $form->error($work, 'monthly_salary'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($work, 'salary_grade'); ?>
        <?php echo $form->dropDownList($work, 'salary_grade', $salGrade); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($work, 'appointment_status'); ?>
        <?php echo $form->textField($work, 'appointment_status'); ?>
        <?php echo $form->error($work, 'appointment_status'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($work, 'goverment_service'); ?>
        <?php echo $form->dropDownList($work, 'goverment_service', $work->government); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($work, 'attachment'); ?>
        <?php echo $form->dropDownList($work, 'attachment', $model->getAttachments(), array('empty'=>'NONE')); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($work->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->