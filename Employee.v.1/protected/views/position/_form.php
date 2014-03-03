<?php
/**
 * Position form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Position
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this PositionController */
/* @var $model Position */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'position-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
));

Yii::app()->clientScript->registerScript(uniqid(), "
    if ('" . (!$model->isNewRecord) . "' && 
        '" . (($model->role == 'DEPARTMENT HEAD') ||
        ($model->employee_id && in_array($model->employee->usr->role, array('ADMIN')))) . "') {
        $('select[id$=role]').attr('disabled', 'disabled').parent().css('display', 'none');
    }
    if ('" . (isset($view)) . "') {
        $('.ui-dialog').find('input[type=text], select, textarea').attr('disabled', 'disabled');
        $('input[type=submit]').parent().css('display', 'none');
    }
");
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php if (!$model->isNewRecord && Yii::app()->user->checkAccess('ADMIN')) : ?>
    <div class="row">
        <label>&nbsp </label>
        <?php
            echo CHTML::button('View Department', array(
                'onclick'=>"window.location = '"
                         . Yii::app()->createUrl("department/update", array("id"=>$model->department_id))
                         . "'",
            ));
        ?>
    </div>
    
    <?php else : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'department_id'); ?>
        <?php
            echo $form->dropDownList($model, 'department_id', $model->getDepartments(), 
                isset($_GET['dept']) ? array('options' => array($_GET['dept']=>array('selected'=>true))) : array()
            );
        ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'employee_id'); ?>
        <?php echo $form->dropDownList($model, 'employee_id', $model->getEmployees(), array('empty'=>'NONE')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title'); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'role'); ?>
        <?php echo $form->dropDownList($model, 'role', array('USER'=>'USER', 'HRMO'=>'HRMO')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'salary_grade'); ?>
        <?php echo $form->dropDownList($model, 'salary_grade', $model->getSalaryGrades()); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'rank'); ?>
        <?php echo $form->dropDownList($model, 'rank', $model->getRanks()); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'level'); ?>
        <?php echo $form->dropDownList($model, 'level', array('1'=>'1', '2'=>'2', '3'=>'3')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textArea($model, 'details',array('placeholder'=>"Separate requirements with semicolons ';'")); ?>
        <?php echo $form->error($model, 'details'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'location'); ?>
        <?php echo $form->textField($model, 'location'); ?>
        <?php echo $form->error($model, 'location'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'education'); ?>
        <?php echo $form->textField($model, 'education'); ?>
        <?php echo $form->error($model, 'education'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'experience'); ?>
        <?php echo $form->textField($model, 'experience'); ?>
        <?php echo $form->error($model, 'experience'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'training'); ?>
        <?php echo $form->textField($model, 'training'); ?>
        <?php echo $form->error($model, 'training'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'eligibility'); ?>
        <?php echo $form->textField($model, 'eligibility'); ?>
        <?php echo $form->error($model, 'eligibility'); ?>
    </div>

    <?php if ($model->appoint_date) : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'appoint_date'); ?>
        <?php
            $appoint_date = ($model->appoint_date) ? date('m/d/Y', strtotime($model->appoint_date)) : date('m/d/Y');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array( 
                'name'=>CHtml::activeName($model, 'appoint_date'),
                'value'=>$appoint_date,
                'options'=>array(
                    'changeYear'=>true,
                    'yearRange'=>'-0:+0',
                )
            ));
        ?>
    </div>
    <?php endif; ?>

    <?php if ($model->vacancy_date) : ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'vacancy_date'); ?>
        <?php
            $vacancy_date = ($model->vacancy_date) ? date('m/d/Y', strtotime($model->vacancy_date)) : date('m/d/Y');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array( 
                'name'=>CHtml::activeName($model, 'vacancy_date'),
                'value'=>$vacancy_date,
                'options'=>array(
                    'changeYear'=>true,
                    'yearRange'=>'-0:+0',
                )
            ));
        ?>
    </div>
    <?php endif; ?>
    
    <div class="row buttons">
        <?php echo CHtml::resetButton('Reset'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->