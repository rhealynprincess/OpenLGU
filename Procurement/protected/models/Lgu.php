<?php

/**
 * This is the model class for table "lgu".
 *
 * The followings are the available columns in table 'lgu':
 * @property integer $id
 * @property double $land_area
 * @property integer $population
 */
class Lgu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lgu the static model class
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
		return 'lgu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, population', 'numerical', 'integerOnly'=>true),
			array('land_area', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, land_area, population', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'land_area' => 'Land Area',
			'population' => 'Population',
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
		$criteria->compare('land_area',$this->land_area);
		$criteria->compare('population',$this->population);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}