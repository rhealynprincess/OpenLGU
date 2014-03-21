<?php
/**
 * Manage Transfers search form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Transfer
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this TransferController */
/* @var $model Transfer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'transfer_id'); ?>
        <?php echo $form->textField($model, 'transfer_id'); ?>
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
        <?php echo $form->label($model, 'adminName'); ?>
        <?php echo $form->textField($model, 'adminName'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'admin_status'); ?>
        <?php echo $form->textField($model, 'admin_status'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'emp_status'); ?>
        <?php echo $form->textField($model, 'emp_status'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model, 'details'); ?>
        <?php echo $form->textField($model, 'details'); ?>
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