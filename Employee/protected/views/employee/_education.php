<?php
/**
 * Employee Education information tab.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
$url = "array('row'=>\$data->primaryKey, 'id'=>$id, 'cat'=>2)";
if (!isset($_GET['id']) || Yii::app()->user->checkAccess('ADMIN')) {
    echo CHtml::ajaxButton('Add', Yii::app()->createUrl('/employee/create', array('id'=>$id, 'cat'=>'2')), 
        array('success'=>'function(data){
            $("#education-dialog").html(data).dialog("open")
        }'), 
        array('class'=>'css-button')
    );
}

$dataProvider = new CActiveDataProvider('EmployeeEducation', array(
    'criteria'=>array(
        'order'=>'from_year, to_year', 
        'condition'=>'employee_id = ' . $id)));

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'education-table', 
    'dataProvider'=>$dataProvider, 
    'enableSorting'=>false, 
    'template'=>'{items}{pager}', 
    'columns'=>array(
        'level', 
        'school_name', 
        'degree_course', 
        'year_graduated', 
        'highest_grade', 
        'from_year', 
        'to_year', 
        array(
            'name'=>'honors_received', 
            'header'=>'Scholarships / Honors Received', 
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
                        $("#education-dialog").load($(this).attr("href"), function(){
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
    'id'=>'education-dialog', 
    'options'=>array(
        'title'=>'III. Educational Background', 
        'autoOpen'=>false, 
        'modal'=>true, 
        'resizable'=>false, 
        'width'=>500, 
        'show'=>'clip', 
        'hide'=>'clip', 
    ), 
));
$this->endWidget();