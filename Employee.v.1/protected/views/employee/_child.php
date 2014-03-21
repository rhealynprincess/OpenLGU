<?php
/**
 * Employee Child information.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
echo '<span class="child">Children</span>';

$url = "array('row'=>\$data->primaryKey, 'id'=>$id, 'cat'=>8)";
if (!isset($_GET['id']) || Yii::app()->user->checkAccess('ADMIN')) {
    echo CHtml::ajaxButton('Add', Yii::app()->createUrl('/employee/create', array('id'=>$id, 'cat'=>'8')), 
        array('success'=>'function(data){
            $("#child-dialog").html(data).dialog("open")
        }'), 
        array('class'=>'css-button')
    );
}

$dataProvider = new CActiveDataProvider('EmployeeChild', array(
    'criteria'=>array(
        'order'=>'name', 
        'condition'=>"employee_id = $id"
    )
));

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'child-table', 
    'dataProvider'=>$dataProvider, 
    'enableSorting'=>false, 
    'template'=>'{items}{pager}', 
    'columns'=>array(
        'name', 
        array(
            'name'=>'birthday', 
            'value'=>'date("m/d/Y", strtotime($data->birthday))', 
        ), 
        array(
            'class'=>'CButtonColumn', 
            'template'=>'{update}{delete}', 
            'buttons'=>array(
                'update'=>array(
                    'url'=>"Yii::app()->createUrl('employee/update', $url)", 
                    'click'=>'function(){
                        $("#child-dialog").load($(this).attr("href"), function(){
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
    'id'=>'child-dialog', 
    'options'=>array(
        'title'=>'II. Family Background - Children', 
        'autoOpen'=>false, 
        'modal'=>true, 
        'resizable'=>false, 
        'width'=>500, 
        'show'=>'clip', 
        'hide'=>'clip', 
    ), 
));
$this->endWidget();