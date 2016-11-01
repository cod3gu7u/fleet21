<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal".
 *
 * @property integer $journal_id
 * @property integer $batch_id
 * @property integer $journal_type_id
 *
 * @property Batch $batch
 * @property JournalType $journalType
 * @property Posting[] $postings
 */
class Journal extends \yii\db\ActiveRecord
{
    const RETURN_JOURNAL_TYPE = 3; // Return Journal
    const SALES_JOURNAL_TYPE_ID = 4; // Sales Journal
    const REFUND_JOURNAL_TYPE = 6; // Refund Journal
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'journal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['batch_id', 'journal_type_id'], 'required'],
            [['batch_id', 'journal_type_id'], 'integer'],
            [['batch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Batch::className(), 'targetAttribute' => ['batch_id' => 'batch_id']],
            [['journal_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => JournalType::className(), 'targetAttribute' => ['journal_type_id' => 'journal_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'journal_id' => 'Journal ID',
            'batch_id' => 'Batch ID',
            'journal_type_id' => 'Journal Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatch()
    {
        return $this->hasOne(Batch::className(), ['batch_id' => 'batch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournalType()
    {
        return $this->hasOne(JournalType::className(), ['journal_type_id' => 'journal_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostings()
    {
        return $this->hasMany(Posting::className(), ['journal_id' => 'journal_id']);
    }
}
