<?php

/**
 * This is the model class for table "userview".
 *
 * The followings are the available columns in table 'userview':
 * @property integer $id
 * @property string $startdate
 * @property string $enddate
 * @property integer $chart
 * @property integer $table
 * @property integer $selection
 * @property integer $period_id
 * @property integer $user_id
 * @property integer $indicator_id
 *
 * The followings are the available model relations:
 * @property Period $period
 * @property User $user
 * @property Indicator $indicator
 */
class Userview extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'userview';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, period_id, user_id, indicator_id', 'required'),
			array('id, chart, table, selection, period_id, user_id, indicator_id', 'numerical', 'integerOnly'=>true),
			array('startdate, enddate, selection, id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, startdate, enddate, chart, table, selection, period_id, user_id, indicator_id', 'safe', 'on'=>'search'),
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
			'period' => array(self::BELONGS_TO, 'Period', 'period_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'indicator' => array(self::BELONGS_TO, 'Indicator', 'indicator_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'startdate' => 'Startdate',
			'enddate' => 'Enddate',
			'chart' => 'Chart',
			'table' => 'Table',
			'selection' => 'Selection',
			'period_id' => 'Period',
			'user_id' => 'User',
			'indicator_id' => 'Indicator',
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
		$criteria->compare('startdate',$this->startdate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('chart',$this->chart);
		$criteria->compare('table',$this->table);
		$criteria->compare('selection',$this->selection);
		$criteria->compare('period_id',$this->period_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('indicator_id',$this->indicator_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Userview the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
