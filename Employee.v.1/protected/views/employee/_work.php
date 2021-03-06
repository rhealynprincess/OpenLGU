<?php
/**
 * Employee Voluntary Work information tab.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
$url = "array('row'=>\$data->primaryKey, 'id'=>$id, 'cat'=>4)";
if (!isset($_GET['id']) || Yii::app()->user->checkAccess('ADMIN')) {
    echo CHtml::ajaxButton('Add', Yii::app()->createUrl('/employee/create', array('id'=>$id, 'cat'=>'4')),
        array('success'=>'function(data){
            $("#work-dialog").html(data).dialog("open")
        }'),
        array('class'=>'css-button')
    );
}

$dataProvider = new CActiveDataProvider('EmployeeWork', array(
    'criteria'=>array(
        'order'=>'from_date, to_date',
        'condition'=>'employee_id = ' . $id
    )
));

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'work-table',
    'dataProvider'=>$dataProvider,
    'enableSorting'=>false,
    'template'=>'{items}{pager}',
    'columns'=>array(
        array(
            'name'=>'from_date',
            'value'=>'($data->from_date) ? date("m/d/Y", strtotime($data->from_date)) : null', 
        ),
        array(
            'name'=>'to_date',
            'value'=>'($data->to_date) ? date("m/d/Y", strtotime($data->to_date)) : null', 
        ),
        'position_title',
        array(
            'name'=>'company_name',
            'header'=>'Department / Agency / Office / Company',
        ),
        'monthly_salary',
        'salary_grade',
        'appointment_status',
        'goverment_service',
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
                        $("#work-dialog").load($(this).attr("href"), function(){
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
    'id'=>'work-dialog',
    'options'=>array(
        'title'=>'V. Work Experience',
        'autoOpen'=>false,
        'modal'=>true,
        'resizable'=>false,
        'width'=>500,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();