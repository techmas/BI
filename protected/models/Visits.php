<?php

/**
 * This is the model class for table "visits".
 *
 * The followings are the available columns in table 'visits':
 * @property integer $id
 * @property integer $total
 * @property integer $sales_id
 *
 * The followings are the available model relations:
 * @property Sales $sales
 */
class Visits extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'visits';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sales_id', 'required'),
			array('total, sales_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, total, sales_id', 'safe', 'on'=>'search'),
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
			'sales' => array(self::BELONGS_TO, 'Sales', 'sales_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'total' => 'Total',
			'sales_id' => 'Sales',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('total',$this->total);
		$criteria->compare('sales_id',$this->sales_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Visits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
