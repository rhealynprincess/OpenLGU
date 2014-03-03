<?php
/**
 * Manage Overtimes index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Overtime
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this OvertimeController */
/* @var $model Overtime */

$this->pageTitle = Yii::app()->name . ' - Manage Overtimes';
$this->breadcrumbs = array(
    'Admin'=>array('/admin'),
    'Overtime',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function(){
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('overtime-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Overtimes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
echo CHtml::button('Advanced Search', array('class'=>'search'));
echo '<div class="search-form" style="display:none">';
$this->renderPartial('_search', array(
    'model'=>$model,
));
echo '</div><!-- search-form -->';

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'overtime-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'overtime_id',
        'headName',
        'details',
        array(
            'name'=>'time',
            'value'=>'($data->time) ? date("m/d/Y H:i:s", strtotime($data->time)) : null',
        ),
        array(
            'name'=>'request_date',
            'value'=>'($data->request_date) ? date("m/d/Y", strtotime($data->request_date)) : null',
        ),
        'head_status',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array(
                'update'=>array(
                    'url'=>'Yii::app()->createUrl("overtime/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#overtime-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("option", "title", "Update Overtime");
                            $(this).dialog("open");
                        });
                        return false;
                    }'
                ),
            ),
        ),
    ),
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'overtime-dialog',
    'options'=>array(
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