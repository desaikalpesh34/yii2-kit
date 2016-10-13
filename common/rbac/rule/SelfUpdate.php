<?php
/**
 * Eugine Terentev <eugine@terentev.net>
 */

namespace common\rbac\rule;

use yii\rbac\Item;
use yii\rbac\Rule;

class SelfUpdate extends Rule
{
    /** @var string */
    public $name = 'selfUpdate';

    /**
     * @param int $user
     * @param Item $item
     * @param array $params
     * - model: model to check owner
     * - attribute: attribute that will be compared to user ID
     * @return bool
     */
    public function execute($user, $item, $params)
    {
        $attribute = isset($params['attribute']) ? $params['attribute'] : 'user_id';
        return $user && isset($params['model']) &&  $user === $params['model']->getAttribute($attribute);
    }
}
