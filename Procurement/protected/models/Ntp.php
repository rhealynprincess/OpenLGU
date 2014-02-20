<?php

/**
 * This is the model class for table "ntp".
 *
 * The followings are the available columns in table 'ntp':
 * @property integer $id
 * @property string $date_of_notice
 * @property string $time_of_notice
 * @property string $details
 * @property string $purchase_order
 * The followings are the available model relations:
 * @property Invitation $id0
 */
class Ntp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ntp the static model class
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
		return 'ntp';
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
			array('date_of_notice, time_of_notice, details, purchase_order', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date_of_notice, time_of_notice, details', 'safe', 'on'=>'search'),
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
			'date_of_notice' => 'Date Of Notice',
			'time_of_notice' => 'Time Of Notice',
			'details' => 'Details',
			'purchase_order' => 'Purchase Order',
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
		$criteria->compare('date_of_notice',$this->date_of_notice,true);
		$criteria->compare('time_of_notice',$this->time_of_notice,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('purchase_order',$this->purchase_order,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
