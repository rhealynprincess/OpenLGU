<?php
/**
 * Issue Overtime form.
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

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'overtime-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));

Yii::app()->clientScript->registerScript(uniqid(), "
    $('select[id$=status]').change(function(){
        $('textarea[id$=report]').attr('disabled', 'disabled').parent().css('display', 'none');
        if ($(this).val() == 'APPROVED') {
            $('textarea[id$=report]').removeAttr('disabled').parent().css('display', 'block');
        }
    }).change();
    if ($('[id$=time]').val()) {
        $('[id$=time]').val('" .date('m/d/Y H:i:s', strtotime($model->time)). "');
    }
    if ('" . (!Yii::app()->user->checkAccess('ADMIN')) . "' &&
        '" . (!$model->isNewRecord) . "') {
        $('.ui-dialog .request').find('input[type=text], select, textarea').attr('disabled', 'disabled');
    }
    if ('" . (isset($view)) . "') {
        $('.ui-dialog').find('input[type=text], select, textarea').attr('disabled', 'disabled');
        $('.ui-dialog input[type=submit]').parent().css('display', 'none');
    }
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
    if ($('.flash-error').size()) {
        $('input[type=submit]').attr('disabled', 'disabled');
    }
");
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php
        foreach (Yii::app()->user->getFlashes() as $key => $message) {
            echo "<div class='flash-$key'>$message</div>";
        }
    ?>
    
    <div class="request">
    <?php if (!$model->isNewRecord) : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'headName'); ?>
        <?php echo $form->textField($model, 'headName', array('readonly'=>'readonly')); ?>
    </div>
    <?php else : ?>
        <?php echo $form->hiddenField($model, 'head_id', array('value'=>Yii::app()->user->getId())); ?>
        <?php echo $form->hiddenField($model, 'head_status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'request_date', array('value'=>date('m/d/Y'))); ?>
    <?php endif; ?>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'time'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker'); ?>
        <?php
            $this->widget('CJuiDateTimePicker', array(
                'model'=>$model,
                'attribute'=>'time',
                'mode'=>'datetime',
                'options'=>array('timeFormat'=>'hh:mm:ss'),
            ));
        ?>
        <?php echo $form->error($model, 'time'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($employees, 'employee_id'); ?>
        <?php if ($model->isNewRecord) : ?>
            <?php
                echo $form->listBox($employees, 'employee_id',
                    $model->getAllEmployees(), 
                    array('multiple'=>'multiple', 'size'=>'10')
                );
            ?>
        <?php else : ?>
            <?php 
                $employees->setScenario('update');
                echo $form->listBox($employees, 'employee_id',
                    $model->getOvertimeEmployees(),
                    array('disabled'=>'disabled')
                );
            ?>
        <?php endif; ?>
        <?php echo $form->error($employees, 'employee_id'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textArea($model, 'details'); ?>
        <?php echo $form->error($model, 'details'); ?>
    </div>
    </div>
    
    <?php if (!$model->isNewRecord) : ?>
    <div class="separator"></div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'request_date'); ?>
        <?php
            echo $form->textField($model, 'request_date', array(
                'readonly'=>'readonly',
                'value'=>date('m/d/Y', strtotime($model->request_date))
            ));
        ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'head_status'); ?>
        <?php echo $form->dropDownList($model, 'head_status', Employee::model()->approve); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'report'); ?>
        <?php echo $form->textArea($model, 'report'); ?>
        <?php echo $form->error($model, 'report'); ?>
    </div>    
    <?php endif; ?>

    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->