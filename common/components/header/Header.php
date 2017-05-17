<?php
namespace common\components\header;

use yii\helpers\Url;
use yii\jui\Widget;

/**
 * {@inheritDoc}
 */
class Header extends Widget
{
    public $scroll = false;


    public function run()
    {
        if (Url::current() === Url::toRoute('site/index')) {
            $this->scroll = true;
        }

        return $this->render('header', ['scroll' => $this->scroll]);
    }
}