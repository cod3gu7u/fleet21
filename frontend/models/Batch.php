<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "batch".
 *
 * @property integer $batch_id
 * @property string $batch_name
 * @property string $batch_date
 *
 * @property Journal[] $journals
 */
class Batch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'batch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['batch_name', 'batch_date'], 'required'],
            [['batch_date'], 'safe'],
            [['batch_name'], 'string', 'max' => 50],
            [['batch_date'], 'default', 'value'=>date('Y-m-d')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'batch_id' => 'Batch ID',
            'batch_name' => 'Batch Name',
            'batch_date' => 'Batch Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournals()
    {
        return $this->hasMany(Journal::className(), ['batch_id' => 'batch_id']);
    }
}
