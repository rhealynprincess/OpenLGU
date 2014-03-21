<?php
/**
 * Manage Calendars Entries search form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Calendar
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this CalendarController */
/* @var $model Calendar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model, 'entry_id'); ?>
        <?php echo $form->textField($model, 'entry_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'author'); ?>
        <?php echo $form->textField($model, 'author'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'date'); ?>
        <?php echo $form->textField($model, 'date', array('id'=>uniqid())); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'details'); ?>
        <?php echo $form->textField($model, 'details'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->