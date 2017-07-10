<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inbox".
 *
 * @property integer $id
 * @property string $sender
 * @property string $theme
 * @property string $body
 * @property string $date
 */
class Inbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sender', 'theme', 'body', 'date'], 'required'],
            [['date'], 'safe'],
            [['sender'], 'email'],
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
            'sender' => 'Sender',
            'theme' => 'Theme',
            'body' => 'Body',
            'date' => 'Date',
        ];
    }
}
