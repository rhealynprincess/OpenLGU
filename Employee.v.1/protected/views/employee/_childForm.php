<?php
/**
 * Employee Child information form.
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
$child = (!isset($_GET['row'])) ? new EmployeeChild : EmployeeChild::model()->findByPk($_GET['row']);

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'child-form', 
    'enableClientValidation'=>true, 
    'clientOptions'=>array('validateOnSubmit'=>true), 
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
     <div class="row">
        <?php echo $form->labelEx($child, 'name'); ?>
        <?php echo $form->textField($child, 'name'); ?>
        <?php echo $form->error($child, 'name'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($child, 'birthday'); ?>
        <?php
            $bday = ($child->birthday) ? date('m/d/Y', strtotime($child->birthday)) : null;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($child, 'birthday'), 
                'value'=>$bday, 
                'options'=>array(
                    'changeYear'=>true, 
                    'minDate'=>'-65Y', 
                    'maxDate'=>'0', 
                )
            ));
        ?>
        <?php echo $form->error($child, 'birthday'); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($child->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->