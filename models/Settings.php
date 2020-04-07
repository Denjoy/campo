<?php

namespace app\models;

use abcms\multilanguage\behaviors\ModelBehavior;
use abcms\multilanguage\Multilanguage;
use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $value
 * @property int $is_delete
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    public function behaviors() {
        return [
            'translate' => [
                'class' => \abcms\multilanguage\behaviors\ModelBehavior::className(),
                'attributes' => [
                    'value:text-area',
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_delete'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',
            'is_delete' => 'Is Delete',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getSettings()
    {
        $settings = Settings::find()
            ->all();

        $translatedModels = Multilanguage::translateMultiple($settings);

        $filtered_models = [];
        foreach ($translatedModels as $m) {
            $filtered_models[$m->name] = $m->value;
        }

        return $filtered_models;
    }
}
