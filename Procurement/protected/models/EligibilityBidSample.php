<?php

/**
 * This is the model class for table "eligibility_bid".
 *
 * The followings are the available columns in table 'eligibility_bid':
 * @property integer $id
 * @property string $file_location
 * @property string $status
 * @property string $date_submitted
 * @property string $time_submitted
 * @property string $date_evaluated
 * @property string $time_evaluated
 * @property string $date_last_modified
 * @property string $time_last_modified
 * @property integer $new_id
 * @property integer $checker
 *
 * The followings are the available model relations:
 * @property Bid $id0
 * @property User $checker0
 */
class EligibilityBidSample extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EligibilityBidSample the static model class
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
		return 'eligibility_bid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, checker', 'numerical', 'integerOnly'=>true),
			array('file_location, status, date_submitted, time_submitted, date_evaluated, time_evaluated, date_last_modified, time_last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, file_location, status, date_submitted, time_submitted, date_evaluated, time_evaluated, date_last_modified, time_last_modified, new_id, checker', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'Bid', 'id'),
			'checker0' => array(self::BELONGS_TO, 'User', 'checker'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'file_location' => 'File Location',
			'status' => 'Status',
			'date_submitted' => 'Date Submitted',
			'time_submitted' => 'Time Submitted',
			'date_evaluated' => 'Date Evaluated',
			'time_evaluated' => 'Time Evaluated',
			'date_last_modified' => 'Date Last Modified',
			'time_last_modified' => 'Time Last Modified',
			'new_id' => 'New',
			'checker' => 'Checker',
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
		$criteria->compare('file_location',$this->file_location,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('date_submitted',$this->date_submitted,true);
		$criteria->compare('time_submitted',$this->time_submitted,true);
		$criteria->compare('date_evaluated',$this->date_evaluated,true);
		$criteria->compare('time_evaluated',$this->time_evaluated,true);
		$criteria->compare('date_last_modified',$this->date_last_modified,true);
		$criteria->compare('time_last_modified',$this->time_last_modified,true);
		$criteria->compare('new_id',$this->new_id);
		$criteria->compare('checker',$this->checker);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}