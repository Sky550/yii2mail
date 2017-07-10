<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "outbox".
 *
 * @property integer $id
 * @property string $receiver
 * @property string $theme
 * @property string $body
 * @property string $date
 */
class Outbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'outbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiver', 'theme', 'body'], 'required'],
            [['date'], 'safe'],
            [['receiver'], 'email'],
            [['theme'], 'string', 'max' => 256],
            [['body'], 'string', 'max' => 5000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiver' => 'Receiver',
            'theme' => 'Theme',
            'body' => 'Body',
            'date' => 'Date',
        ];
    }
}
