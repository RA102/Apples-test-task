<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "apple".
 *
 * @property int $id
 * @property string|null $color
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status
 * @property float|null $how_much_eat
 */
class Apple extends ActiveRecord
{
    const APPLE_ON_TREE = 0;
    const APPLE_ON_GROUND = 10;
    const APPLE_ROT = 11;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apple';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            ['status', 'default', 'value' => [self::APPLE_ON_TREE]],
            ['status', 'in', 'range' => [self::APPLE_ON_TREE, self::APPLE_ON_GROUND, self::APPLE_ROT]],
            [['how_much_eat'], 'number'],
            ['how_much_eat', 'default', 'value' => 1],
            [['color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Color',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'how_much_eat' => 'How Much Eat',
        ];
    }
}
