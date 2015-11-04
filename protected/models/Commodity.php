<?php

/**
 * This is the model class for table "commodity".
 *
 * The followings are the available columns in table 'commodity':
 * @property integer $id
 * @property integer $group
 * @property integer $revenue
 * @property integer $profit
 * @property integer $orders
 * @property integer $costs
 * @property integer $turnover
 * @property integer $clicks
 */
class Commodity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'commodity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, group, revenue, profit, orders, costs, turnover, clicks', 'required'),
			array('id, group, revenue, profit, orders, costs, turnover, clicks', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, group, revenue, profit, orders, costs, turnover, clicks', 'safe', 'on'=>'search'),
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
			'group' => 'Group',
			'revenue' => 'Revenue',
			'profit' => 'Profit',
			'orders' => 'Orders',
			'costs' => 'Costs',
			'turnover' => 'Turnover',
			'clicks' => 'Clicks',
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
		$criteria->compare('group',$this->group);
		$criteria->compare('revenue',$this->revenue);
		$criteria->compare('profit',$this->profit);
		$criteria->compare('orders',$this->orders);
		$criteria->compare('costs',$this->costs);
		$criteria->compare('turnover',$this->turnover);
		$criteria->compare('clicks',$this->clicks);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Commodity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
