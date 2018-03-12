<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "list".
 *
 * @property int $id
 * @property string $list_name
 * @property double $distance
 * @property int $user_id
 */
class TblList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['list_name', 'distance', 'user_id'], 'required'],
            [['distance'], 'number'],
            [['user_id'], 'integer'],
            [['list_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'list_name' => 'List Name',
            'distance' => 'Distance',
            'user_id' => 'User ID',
        ];
    }
}
