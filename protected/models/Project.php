<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $id
 * @property string $project_name
 * @property integer $user_id
 * @property integer $company_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Company $company
 * @property ProjectFile[] $projectFiles
 */
class Project extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_name, company_id', 'required'),
			array('user_id, company_id', 'numerical', 'integerOnly'=>true),
			array('project_name', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, project_name, user_id, company_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'projectFiles' => array(self::HAS_MANY, 'ProjectFile', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'project_name' => 'Project Name',
			'user_id' => 'User',
			'company_id' => 'Company',
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
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('company_id',$this->company_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getCompName(){
        $compArray=CHtml::listData(Company::model()->findAll(),'id','company_name');
        return $compArray;
    }
    public function getCompName1($id){
        $compArray=Company::model()->findByPk($id);
        return $compArray->company_name;
    }
    public function getActiveName(){
        $activeArray=CHtml::listData(Active::model()->findAll(),'id','active');
        return $activeArray;
    }
    public function getAccessName(){
        $accessArray=CHtml::listData(Access::model()->findAll(),'id','access_name');
        return $accessArray;
    }
}
