<?php

/**
 * This is the model class for table "awarding".
 *
 * The followings are the available columns in table 'awarding':
 * @property integer $id
 * @property string $date_awarded
 * @property string $details
 * @property string $time_awarded
 * @property string $purchase_order
 *
 * The followings are the available model relations:
 * @property Invitation $id0
 */
class Awarding extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Awarding the static model class
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
		return 'awarding';
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
			array('id', 'numerical', 'integerOnly'=>true),
			array('date_awarded, details, time_awarded', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date_awarded, details, time_awarded', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'Invitation', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_awarded' => 'Date Awarded',
			'details' => 'Details',
			'time_awarded' => 'Time Awarded',
			//'purchase_order' => 'Purchase Order',
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
		$criteria->compare('date_awarded',$this->date_awarded,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('time_awarded',$this->time_awarded,true);
		//$criteria->compare('purchase_order',$this->purchase_order,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
