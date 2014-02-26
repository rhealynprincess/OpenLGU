<?php

/**
 * This is the model class for table "{{contact_reference}}".
 *
 * The followings are the available columns in table '{{contact_reference}}':
 * @property integer $contact_id
 * @property integer $user_id
 * @property string $type
 * @property string $detail
 * @property string $sys_entry_date
 *
 * The followings are the available model relations:
 * @property Taxpayer $user
 */
class ContactReference extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContactReference the static model class
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
		return '{{contact_reference}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, detail', 'required'),
			array('type, detail, sys_entry_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('contact_id, user_id, type, detail, sys_entry_date', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Taxpayer', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'contact_id' => 'Contact ID',
			'user_id' => 'User ID',
			'type' => 'Type',
			'detail' => 'Detail',
			'sys_entry_date' => 'Sys Entry Date',
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

		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('sys_entry_date',$this->sys_entry_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getType()
	{
		return array(
			'Landline'=>'Landline',
			'Mobile'=>'Mobile',
		);
	}
	
	public function getContacts($id)
	{
		$criteria=new CDbCriteria;
		$criteria->condition = "user_id=".$id;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
