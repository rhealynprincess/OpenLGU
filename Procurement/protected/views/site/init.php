<?php

//to create initial users with roles
/*$auth=Yii::app()->authManager;

$bizRule='return !Yii::app()->user->isGuest;';
$auth->createRole('authenticated', 'authenticated user', $bizRule);
 
$bizRule='return Yii::app()->user->isGuest;';
$auth->createRole('guest', 'guest user', $bizRule);

$role = $auth->createRole('admin', 'administrator');
$auth->assign('admin',1); // adding admin to first user created
*/

/*
$auth=Yii::app()->authManager;
$bizRule = 'return Yii::app()->user->id==$params["User"]->id;';
$auth->createTask('updateSelf', 'update own information', $bizRule);

$role = $auth->getAuthItem('authenticated'); // pull up the authenticated role
$role->addChild('updateSelf'); // assign updateSelf tasks to authenticated users
*/