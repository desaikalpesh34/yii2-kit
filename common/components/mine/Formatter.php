<?php

namespace common\components\mine;

class Formatter extends \yii\i18n\Formatter
{

    public function getCurrencySymbol($currency = null)
    {
        $string = $this->asCurrency(0, $currency);
        $symbol = mb_ereg_replace('^[\d]*.[\d]*.', '', $string);
        return $symbol;
    }

}