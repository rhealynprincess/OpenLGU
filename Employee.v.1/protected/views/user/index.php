<?php
/**
 * Manage Users index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage User
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - Manage Users';
$this->breadcrumbs = array(
    'Admin'=>array('/admin'),
    'User',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function(){
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('user-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Users</h1>

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

echo CHtml::ajaxButton('Add User', Yii::app()->createUrl('/user/create'),
    array('success'=>'function(data){
        $("#user-dialog").dialog("option", "title", "Add User");
        $("#user-dialog").html(data).dialog("open");
    }')
);

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'user-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'role',
        'status',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array(
                'update'=>array(
                    'url'=>'Yii::app()->createUrl("user/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#user-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("option", "title", "Update User");
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
    'id'=>'user-dialog',
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>true,
        'resizable'=>false,
        'width'=>500,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();
?>