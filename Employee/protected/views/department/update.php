<?php
/**
 * Update Department page with list of current Positions under the Department.
 *
 * @package EmployeeInformationSystem
 * @subpackage Department
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
    'Admin'=>array('/admin'),
    'Departments'=>array('index'),
    'Update',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    if ('" . (isset($view)) . "') {
        $('.ui-dialog').find('input[type=text], select, textarea').attr('disabled', 'disabled');
        $('input[type=submit]').parent().css('display', 'none');
        $('.ui-dialog').find('h1, p').css('display', 'none');
    }
");
?>

<h1>Update Department</h1>

<?php
$this->renderPartial('_form', array(
    'model'=>$model,
));

if (Yii::app()->user->checkAccess('ADMIN')) {
    echo CHtml::ajaxButton('Add Position', Yii::app()->createUrl('/position/create', array('dept'=>$id)),
        array('success'=>'function(data){
            $("#position-dialog").html(data).dialog("open");
        }'),
        array('class'=>'css-button')
    );
}

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'position-table',
    'dataProvider'=>$model->getPositions(),
    'enableSorting'=>false,
    'template'=>'{items}{pager}',
    'columns'=>array(
        'title',
        'rank',
        'fullName',
        'role',
        'salary',
        array(
            'name'=>'appoint_date',
            'value'=>'($data->appoint_date) ? date("m/d/Y", strtotime($data->appoint_date)) : null',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array(
                'update'=>array(
                    'url'=>'Yii::app()->createUrl("position/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#position-dialog").load($(this).attr("href"),
                            function(){
                                $(this).dialog("option", "title", "Update Position");
                                $(this).dialog("open");
                            }
                        );
                        return false;
                    }'
                ),
                'delete'=>array('url'=>'Yii::app()->createUrl("position/delete", array("id"=>$data->primaryKey))'),
            ),
            'visible'=>Yii::app()->user->checkAccess('ADMIN'),
        ),
    ),
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'position-dialog',
    'options'=>array(
        'title'=>'Add Position',
        'autoOpen'=>false,
        'modal'=>true,
        'resizable'=>false,
        'width'=>550,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();
?>