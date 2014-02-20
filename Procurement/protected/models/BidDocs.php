<?php

/**
 * This is the model class for table "bid_docs".
 *
 * The followings are the available columns in table 'bid_docs':
 * @property integer $new_id
 * @property integer $id
 * @property string $bidding_document
 *
 * The followings are the available model relations:
 * @property Invitation $id0
 */
class BidDocs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BidDocs the static model class
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
		return 'bid_docs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'numerical', 'integerOnly'=>true),
			array('bidding_document', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('new_id, id, bidding_document', 'safe', 'on'=>'search'),
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
			'new_id' => 'New',
			'id' => 'ID',
			'bidding_document' => 'Bidding Document',
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

		$criteria->compare('new_id',$this->new_id);
		$criteria->compare('id',$this->id);
		$criteria->compare('bidding_document',$this->bidding_document,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}