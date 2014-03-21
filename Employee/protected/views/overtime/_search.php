<?php
/**
 * Manage Overtimes search form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Overtime
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this OvertimeController */
/* @var $model Overtime */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'overtime_id'); ?>
        <?php echo $form->textField($model, 'overtime_id'); ?>
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
        <?php echo $form->label($model, 'time'); ?>
        <?php echo $form->textField($model, 'time', array('id'=>uniqid())); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'details'); ?>
        <?php echo $form->textField($model, 'details'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'report'); ?>
        <?php echo $form->textField($model, 'report'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'request_date'); ?>
        <?php echo $form->textField($model, 'request_date'); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->