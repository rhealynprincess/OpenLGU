<?php
/**
 * Application form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Application
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this ApplicationController */
/* @var $model Application */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'application-form', 
    'enableClientValidation'=>true, 
    'clientOptions'=>array('validateOnSubmit'=>true), 
));

Yii::app()->clientScript->registerScript(uniqid(), "
    if ('" . (!$model->isNewRecord) . "') {
        $('.ui-dialog .request').find('input[type=text], select, textarea').attr('disabled', 'disabled');
        if ('" . (Yii::app()->user->getId() == $model->employee_id) . "') {
            $('input[type=checkbox]:not(:checked)').each(function() {
                $(this).parent().find('select').removeAttr('disabled');
            });
        }
        if ('" . !Yii::app()->user->checkAccess('HRMO') . "') {
            $('select[id*=requirement], input[type=checkbox]').attr('disabled', 'disabled');
        }
        else if ($('select[id*=requirement]').val() == 'APPROVED') {
            $('select[id*=requirement]').attr('disabled', 'disabled');
        }
        if ($('select[id*=psb_status]').val() == 'APPROVED') {
            $('select[id*=psb], textarea[id*=psb]').attr('disabled', 'disabled');
        }
    }
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
    if ($('.flash-error').size()) {
        $('input[type=submit]').attr('disabled', 'disabled');
    }
");
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php if (!$model->isNewRecord &&
              (Yii::app()->user->checkAccess('ADMIN') || Yii::app()->user->checkAccess('HRMO'))) : ?>
    <div class="row">
        <label>&nbsp </label>
        <?php
            $url = Yii::app()->createUrl("employee/view", array("id"=>$model->employee_id));
            echo CHTML::button('View Employee', array('onclick'=>"window.location = '$url'"));
        ?>
    </div>
    <?php endif; ?>

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
        <?php echo $form->labelEx($model, 'fullName'); ?>
        <?php echo $form->textField($model, 'fullName', array('readonly'=>'readonly')); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'positionTitle'); ?>
        <?php
            echo $form->textField($model, 'positionTitle', array(
                'value'=>($model->position_id) ? ($model->positionTitle) : 'APPLICANT',
                'readonly'=>'readonly'
            )); 
        ?>
    </div>
    <?php endif; ?>
    
    <?php if ($model->isNewRecord) : ?>
        <p>Please ensure that all requirements are included in the following attachment.</p>
        <?php echo $form->hiddenField($model, 'employee_id', array('value'=>Yii::app()->user->getId())); ?>
        <?php echo $form->hiddenField($model, 'position_id', array('value'=>$id)); ?>
        <?php echo $form->hiddenField($model, 'requirement_status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'psb_status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'hrmo_status', array('value'=>'PENDING')); ?>
        <?php echo $form->hiddenField($model, 'application_date', array('value'=>date('m/d/Y'))); ?>
    <?php endif; ?>
    
    <?php
    $requirement = strtok($requirements, ';');
    $counter = 0;
    if (!$model->isNewRecord) {
        $model->prepareAttachments();
    }
    while ($requirement) {
        echo "<div class='row'>";
        echo $form->labelEx($model, $requirement);
        echo $form->hiddenField($model, "attachments[$counter][0]");
        echo $form->hiddenField($model, "attachments[$counter][1]");
        echo $form->dropDownList($model, "attachments[$counter][0]", $model->getDocuments(), array('empty'=>'NONE'));
        if ($counter < count($model->attachments)) {
            if ($model->attachments[$counter][0]) {
                echo $form->checkBox($model, "attachments[$counter][1]");
                echo CHtml::imageButton(Yii::app()->request->baseUrl . "/images/download.png", array(
                    'name'=>$model->attachments[$counter][0],
                    'submit'=>array('document/download', 'id'=>$model->attachments[$counter][0])
                ));
            }
        }
        echo '</div>';
        $requirement = strtok(';');
        $counter++;
    }
    ?>
    </div>

    <?php if (!$model->isNewRecord) : ?>
    <div class="separator"></div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'application_date'); ?>
        <?php
            echo $form->textField($model, 'application_date', array(
                'readonly'=>'readonly',
                'value'=>date('m/d/Y', strtotime($model->application_date))
            ));
        ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'requirement_status'); ?>
        <?php echo $form->dropDownList($model, 'requirement_status', Employee::model()->status); ?>
    </div>

        <?php 
            if (($model->requirement_status == 'APPROVED' && $model->checkChair()) ||
                ($model->psb_status == 'APPROVED' && Yii::app()->user->checkAccess('HRMO'))) : 
        ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'screen_date'); ?>
            <?php
                $screen_date = ($model->screen_date) ? date('m/d/Y', strtotime($model->screen_date)) : date('m/d/Y');
                $this->widget('zii.widgets.jui.CJuiDatePicker', array( 
                    'name'=>CHtml::activeName($model, 'screen_date'),
                    'value'=>$screen_date,
                    'options'=>array(
                        'changeYear'=>true,
                        'yearRange'=>'-0:+0',
                    )
                ));
            ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'psb_status'); ?>
            <?php echo $form->dropDownList($model, 'psb_status', Employee::model()->status); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'psb_details'); ?>
            <?php echo $form->textArea($model, 'psb_details'); ?>
            <?php echo $form->error($model, 'psb_details'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'psb_attachment'); ?>
            <?php 
                echo $form->dropDownList($model, 'psb_attachment',
                    $model->getPSBAttachments(),
                    array('empty'=>'NONE')
                );
            ?>
            <?php echo $form->error($model, 'psb_attachment'); ?>
        </div>

            <?php if (($model->psb_status == 'APPROVED' && Yii::app()->user->checkAccess('HRMO'))) : ?>
            <div class="row">
                <?php echo $form->labelEx($model, 'hrmoName'); ?>
                <?php echo $form->textField($model, 'hrmoName', array('readonly'=>'readonly')); ?>
            </div>
            
            <div class="row">
                <?php echo $form->labelEx($model, 'hrmo_status'); ?>
                <?php echo $form->dropDownList($model, 'hrmo_status', Employee::model()->status); ?>
            </div>
            <?php endif; ?>        
        <?php endif; ?>
    <?php endif; ?>

    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php
            if ($model->isNewRecord) {
                echo CHtml::submitButton('Submit');
            }
            else {
                echo CHtml::button('Submit', array(
                    'name'=>'Submit',
                    'submit'=>array('application/update', 'id'=>$model->application_id)
                ));
            }
        ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->