<?php
/**
 * Calendar Entry form.
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

<?php
$user = User::model()->findByPk(Yii::app()->user->getId());
$model->author = $user->last_name . ', '
               . substr($user->first_name,0,1) . '.' 
               . substr($user->middle_name,0,1) . '.';

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'calendar-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'author'); ?>
        <?php echo $form->textField($model, 'author', array('readonly'=>'readonly')); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'date'); ?>
        <?php
            $date = ($model->date) ? date('m/d/Y', strtotime($model->date)) : date('m/d/Y');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>CHtml::activeName($model, 'date'),
                'value'=>$date,
                'options'=>array(
                    'changeYear'=>true,
                    'yearRange'=>'+0',
                )
            ));
        ?>
        <?php echo $form->error($model, 'date'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textArea($model, 'details'); ?>
        <?php echo $form->error($model, 'details'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->