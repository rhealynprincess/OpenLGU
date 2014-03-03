<?php
/**
 * Custom view file for listing open Positions.
 *
 * @package EmployeeInformationSystem
 * @subpackage Vacancy
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this PositionController */
/* @var $data Position */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('department_id')); ?>:</b>
    <?php echo CHtml::encode($data->departmentName); ?>
    <br>

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br>
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('salary_grade')); ?>:</b>
    <?php echo CHtml::encode($data->salary_grade); ?>
    <br>

    <b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
    <?php echo CHtml::encode($data->location); ?>
    <br>
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
    <?php echo CHtml::encode($data->details); ?>
    <br>

    <b><?php echo CHtml::encode($data->getAttributeLabel('education')); ?>:</b>
    <?php echo CHtml::encode($data->education); ?>
    <br>

    <b><?php echo CHtml::encode($data->getAttributeLabel('experience')); ?>:</b>
    <?php echo CHtml::encode($data->experience); ?>
    <br>

    <b><?php echo CHtml::encode($data->getAttributeLabel('training')); ?>:</b>
    <?php echo CHtml::encode($data->training); ?>
    <br>

    <b><?php echo CHtml::encode($data->getAttributeLabel('eligibility')); ?>:</b>
    <?php echo CHtml::encode($data->eligibility); ?>
    <br>

    <b><?php echo CHtml::encode($data->getAttributeLabel('vacancy_date')); ?>:</b>
    <?php echo CHtml::encode(date('m/d/Y', strtotime($data->vacancy_date))); ?>
    <br>
    
    <?php
        if (!Yii::app()->user->isGuest) {
            $application = Application::model()->getMyPendingApplication();
            if (isset($application->application_id) && $application->position_id == $data->position_id) {
                echo CHtml::ajaxButton('Update',
                    Yii::app()->createUrl('/application/update', array('id'=>$application->application_id)),
                    array('success'=>'function(html){
                        $("#vacancy-dialog").dialog("option", "title", "Apply for Position ' . $data->title . '");
                        $("#vacancy-dialog").html(html).dialog("open");
                    }')
                );
            }
            else if (!isset($application->application_id)) {
                echo CHtml::ajaxButton('Apply',
                    Yii::app()->createUrl('/application/create', array('id'=>$data->position_id)),
                    array(
                        'name'=>"apply_$data->position_id",
                        'success'=>'function(html){
                            $("#vacancy-dialog").dialog("option", "title", "Apply for Position ' . $data->title . '");
                            $("#vacancy-dialog").html(html).dialog("open");
                        }'
                    )
                );
            }
            if (PersonnelSelectionBoard::model()->checkViewPermission($data)) {
                $application = Application::model()->getPendingApplications($data->position_id);
                $url = Yii::app()->createUrl("vacancy/view", array("id"=>$data->position_id));
                echo CHtml::button("View Applications ($application->itemCount)",
                    array('onclick'=>"window.location = '$url'")
                );
            }
        }
    ?>

</div>