<?php
/**
 * Manage Resignations search form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Resign
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this ResignController */
/* @var $model Resign */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'resign_id'); ?>
        <?php echo $form->textField($model, 'resign_id'); ?>
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
        <?php echo $form->label($model, 'hrmoName'); ?>
        <?php echo $form->textField($model, 'hrmoName'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'hrmo_status'); ?>
        <?php echo $form->textField($model, 'hrmo_status'); ?>
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