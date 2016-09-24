<?php 
namespace common\components\mine;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Component;
use yii\rest\Serializer;

class MySearializer extends Serializer
{
    public function serialize($data) 
    {
        $d = parent::serialize($data);
        $link = $d['_links'];
        $new_link =[];
        $self=false;
        $next=false;
        $last =false;
        $first =false;
        $prev=false;
        foreach ($d['_links'] as $key => $value) 
        {
        	if($key=='self')
        	{
        	   $new_link['self'] = $value['href'];
               $self=true;

            }elseif($key=='next')
            {
               $new_link['next'] = $value['href'];
               $next=true;

            }elseif($key=='last')
            {
               $new_link['last'] = $value['href'];
               $last=true;

            }elseif($key=='first')
            {
               $new_link['first'] = $value['href'];
               $first=true;

            }elseif($key=='prev')
            {
               $new_link['prev'] = $value['href'];
               $prev=true;
            }
        }
        if(!$self)
        {
            $new_link['self']='';
        }
        if(!$next)
        {
            $new_link['next']='';
        }
        if(!$last)
        {
            $new_link['last']='';
        }
        if(!$first)
        {
            $new_link['first']='';
        }
        if(!$prev)
        {
            $new_link['prev']='';
        }
    
        $d['_links'] = $new_link;
        return $d;
    }
}
?>