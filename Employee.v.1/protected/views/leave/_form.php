<?php
/**
 * Leave Request form.
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

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'leave-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));

Yii::app()->clientScript->registerScript(uniqid(), "
    var vacation = " . json_encode($model->vacation) . ";
    var sick = " . json_encode($model->sick) . ";
    
    if ($('select[id$=type]').val() > 2) {
        $('select[id$=option]').attr('disabled', 'disabled').parent().css('display', 'none');
    }
    $('select[id$=type]').change(function(){
        if ($(this).val() > 2) {
            $('select[id$=option]').attr('disabled', 'disabled').parent().css('display', 'none');
        }
        else {
            $('select[id$=option]').html('').removeAttr('disabled').parent().css('display', 'block');
            if ($(this).val() == 1) {
                $.each(vacation, function(val, text) {
                    $('select[id$=option]').append($('<option></option>').val(val).html(text));
                });
            }
            else {
                $.each(sick, function(val, text) {
                    $('select[id$=option]').append($('<option></option>').val(val).html(text));
                });
            }
        }
    });
    $('select[id$=status]').change(function(){
        $('textarea[id$=head_details]').attr('disabled', 'disabled').parent().css('display', 'none');
        $('input[id$=pay]').attr('disabled', 'disabled').parent().css('display', 'none');
        if ($(this).val() == 'APPROVED') {
            $('input[id$=pay]').removeAttr('disabled').parent().css('display', 'block');
        }
        else if ($(this).val() == 'REJECTED') {
            $('textarea[id$=head_details]').removeAttr('disabled').parent().css('display', 'block');
        }
    }).change();
    $('#leave-form input[id^=Leave_date]').change(function(){
        var date_from = new Date($('input[id$=date_from]').val());
        var date_to = new Date($('input[id$=date_to]').val());
        var day, days = null;
        var flag = true;

        if (date_from > date_to) {
            days = 0;
        }
        else if (date_from > 0 && date_to > 0 && date_from <= date_to) {
            while (flag) {
                day = date_from.getDay();
                if (day != 0 && day != 6) {
                    days++;
                }
                if (date_from.getDate() == date_to.getDate() &&
                    date_from.getMonth() == date_to.getMonth()) {
                    flag = false;
                }
                date_from.setDate(date_from.getDate()+1);
            }
        }

        $('input[id$=days]').val(days);
    });
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
    
    <?php if ($model->approve_date) : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'approve_date'); ?>
        <?php
            echo $form->textField($model, 'approve_date', array(
                'readonly'=>'readonly',
                'value'=>date('m/d/Y', strtotime($model->approve_date))
            ));
        ?>
    </div>
    <?php endif; ?>
    
    <div class="request">
    <?php if (!$model->isNewRecord) : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'headName'); ?>
        <?php echo $form->textField($model, 'headName', array('readonly'=>'readonly')); ?>
    </div>
    
        <?php if ($model->employee->position) : ?>
        <div class="row">
            <?php echo $form->labelEx($model->employee->position, 'title'); ?>
            <?php 
                echo $form->textField($model->employee->position, 'title',
                    array('readonly'=>'readonly')
                );
            ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model->employee->position->department, 'name'); ?>
            <?php
                echo $form->textField($model->employee->position->department, 'name',
                    array('readonly'=>'readonly')
                ); 
            ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model->employee->position->salaryGrade, 'salary_grade'); ?>
            <?php
                echo $form->textField($model->employee->position->salaryGrade, 'salary_grade',
                    array('readonly'=>'readonly')
                );
            ?>
        </div>
        <?php endif; ?>
    
    <?php else : ?>
    <div class="row">
        <?php echo $form->hiddenField($model, 'employee_id', array('value'=>Yii::app()->user->getId())); ?>
        <?php echo $form->hiddenField($model, 'head_status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'request_date', array('value'=>date('m/d/Y'))); ?>
    </div>
    <?php endif; ?>    
    
    <div class="row">
        <?php echo $form->labelEx($model, 'leave_type'); ?>
        <?php echo $form->dropDownList($model, 'leave_type', $model->getLeaveTypes()); ?>
        <?php echo $form->error($model, 'leave_type'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'leave_option'); ?>
        <?php 
            echo $form->dropDownList($model, 'leave_option',
                ($model->leave_type == 2) ? $model->sick :  $model->vacation
            ); 
        ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textArea($model, 'details'); ?>
        <?php echo $form->error($model, 'details'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'commutation'); ?>
        <?php echo $form->dropDownList($model, 'commutation', $model->commutationList); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'date_from'); ?>
        <?php
            $date_from = ($model->date_from) ? date('m/d/Y', strtotime($model->date_from)) : date('m/d/Y');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array( 
                'name'=>CHtml::activeName($model, 'date_from'),
                'value'=>$date_from,
                'options'=>array(
                    'changeYear'=>true,
                    'yearRange'=>'-0:+0',
                )
            ));
        ?>
        <?php echo $form->error($model, 'date_from'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'date_to'); ?>
        <?php
            $date_to = ($model->date_to) ? date('m/d/Y', strtotime($model->date_to)) : date('m/d/Y');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array( 
                'name'=>CHtml::activeName($model, 'date_to'),
                'value'=>$date_to,
                'options'=>array(
                    'changeYear'=>true,
                    'yearRange'=>'-0:+0',
                )
            ));
        ?>
        <?php echo $form->error($model, 'date_to'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'days'); ?>
        <?php echo $form->textField($model, 'days', array('readonly'=>'readonly')); ?>
        <?php echo $form->error($model, 'days'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'attachment'); ?>
        <?php echo $form->dropDownList($model, 'attachment', $model->getAttachments(), array('empty'=>'NONE')); ?>
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
        <?php echo $form->labelEx($model, 'head_id'); ?>
        <?php echo $form->dropDownList($model, 'head_id', $model->getHead()); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'head_status'); ?>
        <?php echo $form->dropDownList($model, 'head_status', Employee::model()->status); ?>
    </div>
        
    <div class="row">
        <div class="credits">
            <p>Leave Credits as of <?php echo date('m/d/Y'); ?>:</p>
            <?php $credits = $model->getLeaveCredits(); ?>
            <p><?php echo 'Vacation - ' . $credits['vacation'] . ' day(s)'; ?></p>
            <p><?php echo 'Sick - ' . $credits['sick'] . ' day(s)'; ?></p>
        </div>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'head_details'); ?>
        <?php echo $form->textArea($model, 'head_details'); ?>
        <?php echo $form->error($model, 'head_details'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'days_with_pay'); ?>
        <?php echo $form->textField($model, 'days_with_pay'); ?>
        <?php echo $form->error($model, 'days_with_pay'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'days_without_pay'); ?>
        <?php echo $form->textField($model, 'days_without_pay'); ?>
        <?php echo $form->error($model, 'days_without_pay'); ?>
    </div>
    <?php endif; ?>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->