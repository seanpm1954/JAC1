<?php

/**
 * This is the model class for table "projectFile".
 *
 * The followings are the available columns in table 'projectFile':
 * @property integer $id
 * @property string $projectFile_name
 * @property integer $project_id
 *
 * The followings are the available model relations:
 * @property Project $project
 */
class ProjectFile extends CActiveRecord
{
    public $uploadFile;
    public $path1="/Users/smaloney/Sites/JAC1/uploads/";
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projectFile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('projectFile_name, project_id', 'required'),
			array('project_id', 'numerical', 'integerOnly'=>true),
			array('projectFile_name', 'length', 'max'=>150),
            array('uploadFile', 'file','types'=>'pdf,xlsx,xls,doc,docx'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, projectFile_name, project_id', 'safe', 'on'=>'search'),
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
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'projectFile_name' => 'Project File Name',
			'project_id' => 'Project',
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
		$criteria->compare('projectFile_name',$this->projectFile_name,true);
		$criteria->compare('project_id',$this->project_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProjectFile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
public function getProjects(){
    $projs=CHtml::listData(Project::model()->findAll(),'id','project_name');
    return $projs;
}

}
