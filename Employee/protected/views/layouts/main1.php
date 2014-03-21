
<?php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();

/*if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}
*/
?>

<?php 
/**
 * Main layout file for the website.
 *
 * @package EmployeeInformationSystem
 * @subpackage
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this Controller */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/prefixfree.min.js'); ?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
    </div><!-- header -->

    <div id="mainmenu">
        <?php 
            $isGuest = Yii::app()->user->isGuest;
            $this->widget('zii.widgets.CMenu',array(
                'items'=>array(
                    array(
                        'label'=>'Home',
                        'url'=>array('/site/index')
                    ),
                    array(
                        'label'=>'Job Vacancies',
                        'url'=>array('/vacancy/index'),
                    ),
                    array(
                        'label'=>'Calendar',
                        'url'=>array('/calendar/view'),
                        'visible'=>!$isGuest && !Yii::app()->user->checkAccess('APPLICANT')
                    ),
                    array(
                        'label'=>'Profile',
                        'url'=>array('/site/profile'),
                        'visible'=>!$isGuest
                    ),
                    array(
                        'label'=>'Admin',
                        'url'=>array('/admin/index'),
                        'visible'=>Yii::app()->user->checkAccess('ADMIN')
                    ),
                    array(
                        'label'=>'Department Head',
                        'url'=>array('/head/index'),
                        'visible'=>Yii::app()->user->checkAccess('DEPARTMENT HEAD')
                    ),
                    array(
                        'label'=>'HRMO',
                        'url'=>array('/hrmo/index'),
                        'visible'=>Yii::app()->user->checkAccess('HRMO')
                    ),
                    array(
                        'label'=>'Register',
                        'url'=>array('/site/register'),
                        'visible'=>$isGuest
                    ),
                    array(
                        'label'=>'Login',
                        'url'=>array('/site/login'),
                        'visible'=>$isGuest
                    ),
                    array(
                        'label'=>'Logout (' . Yii::app()->user->name . ')',
                        'url'=>array('/site/logout'),
                        'visible'=>!Yii::app()->user->isGuest
                    )
                ),
            ));
        ?>

<div style='float:right;margin-top:-24px;'><a href='../../OpenLGU'><img src="../Procurement/images/home.jpg" alt="OpenLGU" width="23" height="23">  </a></div>

    </div><!-- mainmenu -->
    <?php if (isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> by Ferdinand C. Pendon, UPLB.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>
