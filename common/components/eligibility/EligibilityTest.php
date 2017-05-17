<?php
namespace common\components\eligibility;

use yii\base\Widget;

class EligibilityTest extends Widget
{
    public function run()
    {
        return $this->render('eligibility-test');
    }
}