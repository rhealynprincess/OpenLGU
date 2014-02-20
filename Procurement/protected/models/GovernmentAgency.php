<?php

/**
 * This is the model class for table "government_agency".
 *
 * The followings are the available columns in table 'government_agency':
 * @property integer $id
 * @property string $government_branch
 * @property string $type
 * @property string $sector
 *
 * The followings are the available model relations:
 * @property Organization $id0
 */
class GovernmentAgency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GovernmentAgency the static model class
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
		return 'government_agency';
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
			array('government_branch, type, sector', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, government_branch, type, sector', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'Organization', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'government_branch' => 'Government Branch',
			'type' => 'Type',
			'sector' => 'Sector',
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
		$criteria->compare('government_branch',$this->government_branch,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('sector',$this->sector,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}