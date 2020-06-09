<?php

namespace Open\Weather\Block;

use Magento\Framework\View\Element\Template;

class News extends Template
{


    public function  get()
    {
        $path='http://api.openweathermap.org/data/2.5/weather?q=hanoi&appid=c6afe708c675d40432cf36b421574dcd';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$path);
        curl_setopt($ch, CURLOPT_FAILONERROR,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $retValue = curl_exec($ch);
        return $retValue;
    }

}

