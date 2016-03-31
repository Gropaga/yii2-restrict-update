<?php

namespace updaterestrict;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * This is just an example.
 */
class RestrictUpdateBehaviour extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
        ];
    }

    public function beforeUpdate($event)
    {
        $model = $event->sender;
        if ($model->created_by != Yii::$app->user->id) {
            $model->addError('created_by','Your are trying to update a record which does not belong to you!');
        }
    }

    public function beforeDelete($event)
    {
        $model = $event->sender;
        if ($model->created_by != Yii::$app->user->id) {
            $model->addError('created_by','Your are trying to delete a record which does not belong to you!');
        }
    }
}
