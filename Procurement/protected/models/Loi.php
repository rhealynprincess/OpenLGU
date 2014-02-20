<?php

/**
 * This is the model class for table "loi".
 *
 * The followings are the available columns in table 'loi':
 * @property integer $id
 * @property integer $user_id
 * @property integer $invitation_id
 * @property string $date_submitted
 * @property string $time_submitted
 * @property string $status
 * @property string $date_last_modified
 * @property string $time_last_modified
 * @property string $file_location
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Invitation $invitation
 */
class Loi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Loi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, invitation_id', 'numerical', 'integerOnly'=>true),
			array('date_submitted, time_submitted, status, date_last_modified, time_last_modified, file_location', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, invitation_id, date_submitted, time_submitted, status, date_last_modified, time_last_modified, file_location', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'invitation' => array(self::BELONGS_TO, 'Invitation', 'invitation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'invitation_id' => 'Invitation',
			'date_submitted' => 'Date Submitted',
			'time_submitted' => 'Time Submitted',
			'status' => 'Status',
			'date_last_modified' => 'Date Last Modified',
			'time_last_modified' => 'Time Last Modified',
			'file_location' => 'File Location',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('invitation_id',$this->invitation_id);
		$criteria->compare('date_submitted',$this->date_submitted,true);
		$criteria->compare('time_submitted',$this->time_submitted,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('date_last_modified',$this->date_last_modified,true);
		$criteria->compare('time_last_modified',$this->time_last_modified,true);
		$criteria->compare('file_location',$this->file_location,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}