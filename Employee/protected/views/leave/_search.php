<?php
/**
 * Manage Leaves search form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Leave
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this LeaveController */
/* @var $model Leave */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'leave_id'); ?>
        <?php echo $form->textField($model, 'leave_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fullName'); ?>
        <?php echo $form->textField($model, 'fullName'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'headName'); ?>
        <?php echo $form->textField($model, 'headName'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'head_status'); ?>
        <?php echo $form->textField($model, 'head_status'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'head_details'); ?>
        <?php echo $form->textField($model, 'head_details'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'date_from'); ?>
        <?php echo $form->textField($model, 'date_from', array('id'=>uniqid())); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'date_to'); ?>
        <?php echo $form->textField($model, 'date_to', array('id'=>uniqid())); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'days'); ?>
        <?php echo $form->textField($model, 'days'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'commutation'); ?>
        <?php echo $form->textField($model, 'commutation'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'leaveName'); ?>
        <?php echo $form->textField($model, 'leaveName'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'leave_option'); ?>
        <?php echo $form->textField($model, 'leave_option'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'details'); ?>
        <?php echo $form->textField($model, 'details'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'days_with_pay'); ?>
        <?php echo $form->textField($model, 'days_with_pay'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'days_without_pay'); ?>
        <?php echo $form->textField($model, 'days_without_pay'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'request_date'); ?>
        <?php echo $form->textField($model, 'request_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'approve_date'); ?>
        <?php echo $form->textField($model, 'approve_date'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->