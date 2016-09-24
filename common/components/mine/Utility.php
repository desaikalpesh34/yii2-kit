<?php 
namespace common\components\mine;

use Yii;
//use yii\helpers\ArrayHelper;

class Utility extends \yii\base\Model{
    const DATE_FORMAT = 'php:Y-m-d';
    const DATETIME_FORMAT = 'php:Y-m-d H:i:s';
    const TIME_FORMAT = 'php:H:i:s';
 
    public static function convertDate2Db($dateStr, $type='date', $format = null) {
        if ($type === 'datetime') {
              $fmt = ($format == null) ? self::DATETIME_FORMAT : $format;
        }
        elseif ($type === 'time') {
              $fmt = ($format == null) ? self::TIME_FORMAT : $format;
        }
        else {
              $fmt = ($format == null) ? self::DATE_FORMAT : $format;
        }
        return \Yii::$app->formatter->asDate($dateStr, $fmt);
    }


    public static function getRelativedate($datetime)
   { // MySQL DateTime, in UTC as system managed into UTC timezone
       $estimate_time = time() - strtotime($datetime);

     $condition = array(
           12 * 30 * 24 * 60 * 60 => 'year',
           30 * 24 * 60 * 60      => 'month',
           24 * 60 * 60           => 'day',
           60 * 60                => 'hour',
           60                     => 'minute',
           1                      => 'second'
       );

       if ($estimate_time < 1)
       {
            if($estimate_time)
            {
               return 'less than 1 second ago';
            }else
            {
                 foreach($condition as $secs => $str)
                 {
                       $d = $estimate_time / $secs;

                       if ($d >= 1)
                       {
                           $r = round($d);
                           return 'in ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' days';
                       }
                   }
               }
            
       }

     
       foreach ($condition as $secs => $str)
       {
           $d = $estimate_time / $secs;

           if ($d >= 1)
           {
               $r = round($d);
               return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
           }
       }
   }
}
?>
