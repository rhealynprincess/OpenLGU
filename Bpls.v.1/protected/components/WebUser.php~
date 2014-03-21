<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
 
  // Return first name.
  // access it by Yii::app()->user->first_name
	function getFirst_Name()
	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->first_name;
  	}
  
	function getMiddle_Name()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->middle_name;
  	}
  
  	function getLast_Name()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->last_name;
  	}
  
  	function getFull_Name()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->full_name;
  	}
  
  	function getEmail()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->email;
  	}
	
	function getUsername()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->username;
  	}
  
  	function getDob_Month()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->dob_month;
  	}
  
  	function getDob_Day()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->dob_day;
  	}
  
  	function getDob_Year()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->dob_year;
  	}
  
  	function getGender()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->gender;
  	}
  
  	function getCivil_Status()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->civil_status;
  	}
 
	function getTin()
  	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->tin;
  	}
  	
  	function getApplication_Date()
	{
    	$user = $this->loadUser(Yii::app()->user->id);
    	if($user!==null)
    	return $user->application_date;
  	}
 
  // Load user model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=Taxpayer::model()->findByPk($id);
        }
        return $this->_model;
    }
}
