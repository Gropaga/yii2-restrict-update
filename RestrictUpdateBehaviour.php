<?php

namespace updaterestrict;

use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * This is just an example.
 */
class RestrictBehaviour extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    public function beforeValidate($event)
    {
        echo "123";
    }
}
