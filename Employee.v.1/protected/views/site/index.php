<?php
/**
 * Site index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Site
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>
Developed by Ferdinand C. Pendon<br>
BS Computer Science<br>
University of the Philippines Los Banos
</p>

<b>Features:</b>
<ul>
    <li>Creation and Management of Employee Records</li>
    <li>File Repository</li>
    <li>Performance Evaluation</li>
    <li>Leave, Resignation, Overtime, and Transfer Requests</li>
    <li>Customizable Organizational Structure</li>
    <li>Calendar</li>
    <li>Publication of Job Vacancies</li>
    <li>System Logging using Audit Trail</li>
    <li>Open Source Project Developed in Yii Framework</li>
</ul>