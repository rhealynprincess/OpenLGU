<?php
/**
 * Employee Civil Service Eligibility information tab.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
$url = "array('row'=>\$data->primaryKey, 'id'=>$id, 'cat'=>3)";
if (!isset($_GET['id']) || Yii::app()->user->checkAccess('ADMIN')) {
    echo CHtml::ajaxButton('Add', Yii::app()->createUrl('/employee/create', array('id'=>$id, 'cat'=>'3')), 
        array('success'=>'function(data){
            $("#cse-dialog").html(data).dialog("open")
        }'), 
        array('class'=>'css-button')
    );
}

$dataProvider = new CActiveDataProvider('EmployeeEligibility', array(
    'criteria'=>array(
        'order'=>'date_of_exam', 
        'condition'=>"employee_id = $id"
    )
));

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'cse-table', 
    'dataProvider'=>$dataProvider, 
    'enableSorting'=>false, 
    'template'=>'{items}{pager}', 
    'columns'=>array(
        array(
            'name'=>'career_service', 
            'header'=>'Career Service / RA 1080 (Board/Bar) / CES / CSEE', 
        ), 
        'rating', 
        array(
            'name'=>'date_of_exam', 
            'value'=>'date("m/d/Y", strtotime($data->date_of_exam))', 
        ), 
        'place_of_exam', 
        'license_no', 
        array(
            'name'=>'license_release_date', 
            'value'=>'($data->license_release_date) ? date("m/d/Y", strtotime($data->license_release_date)) : null', 
        ),
        array(
            'name'=>'attachment',
            'type'=>'raw',
            'htmlOptions'=>array('class'=>'button-column'),
            'value'=>'($data->attachment) ? CHtml::imageButton(
                                                Yii::app()->request->baseUrl . "/images/download.png",
                                                array(
                                                    "submit"=>array("document/download", "id"=>$data->attachment),
                                                    "confirm"=>"Are you sure you want to download this file?",
                                                )
                                            )
                                          : null',
        ),
        array(
            'class'=>'CButtonColumn', 
            'template'=>'{update}{delete}', 
            'buttons'=>array(
                'update'=>array(
                    'url'=>"Yii::app()->createUrl('employee/update', $url)", 
                    'click'=>'function(){
                        $("#cse-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("open");
                        });
                        return false;
                    }'
                ), 
                'delete'=>array('url'=>"Yii::app()->createUrl('employee/delete', $url)"), 
            ), 
            'visible'=>Yii::app()->user->checkAccess('ADMIN'), 
        ), 
    ), 
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cse-dialog', 
    'options'=>array(
        'title'=>'IV. Civil Service Eligibility', 
        'autoOpen'=>false, 
        'modal'=>true, 
        'resizable'=>false, 
        'width'=>500, 
        'show'=>'clip', 
        'hide'=>'clip', 
    ), 
));
$this->endWidget();