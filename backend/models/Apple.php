<?php

namespace backend\models;

use app\models\Status;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use function Sodium\compare;

/**
 * This is the model class for table "apple".
 *
 * @property int $id
 * @property string|null $color
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status_id
 * @property float|null $how_much_left
 * @property int|null $point_no_return
 */
class Apple extends ActiveRecord
{
    const APPLE_ON_TREE = 1;
    const APPLE_ON_GROUND = 2;
    const APPLE_ROT = 3;



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
            [['created_at'], 'integer'],
            ['updated_at', 'compare', ],
            ['point_no_return', 'integer'],
            ['status_id', 'default', 'value' => [self::APPLE_ON_TREE]],
            ['status_id', 'in', 'range' => [self::APPLE_ON_TREE, self::APPLE_ON_GROUND, self::APPLE_ROT]],
            [['how_much_left'], 'number'],
            ['how_much_left', 'default', 'value' => 1],
//            ['how_much_left', 'compare', 'compareAttribute' => 'status_id', 'compareValue' => '1', 'operator' => '=',  'message' => 'Нельзя съесть'],
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
            'point_no_return' => 'Point No Return',
            'status_id' => 'Status',
            'how_much_left' => 'How Much Left',
        ];
    }

    /**
     *
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

}
