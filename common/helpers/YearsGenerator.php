<?php

namespace common\helpers;

class YearsGenerator
{
    public static function generate()
    {
        $years = [];

        for ($year = 1916; $year <= 2017; $year++) {
            $years[] = [$year => $year];
        }

        return $years;
    }
}