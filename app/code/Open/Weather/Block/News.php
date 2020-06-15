<?php

namespace Open\Weather\Block;

use Magento\Framework\View\Element\Template;

class News extends Template
{
    public $time;
    protected $day;
    protected $date;

    public function  getWeather()
    {
        $path='http://api.openweathermap.org/data/2.5/weather?q=hanoi&appid=c6afe708c675d40432cf36b421574dcd';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$path);
        curl_setopt($ch, CURLOPT_FAILONERROR,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $retValue = curl_exec($ch);

        date_default_timezone_set('asia/ho_chi_minh');
        $this->time=date("h:i:sa");
        $this->day=date("l");
        $this->date=date("Y-m-d");
        return $retValue;
    }
    public function  updateTime()
    {

       $arrTime= array(
            "time"=>"$this->time",
            "day"=>"$this->day",
            "date"=>"$this->date"
        );

        return $arrTime ;
    }
}

