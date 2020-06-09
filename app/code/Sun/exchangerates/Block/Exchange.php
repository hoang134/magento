<?php

namespace Sun\exchangerates\Block;

use Magento\Framework\View\Element\Template;

class Exchange extends Template
{
    public function getExchangerates()
    {
        $path = 'http://www.floatrates.com/daily/usd.xml';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $retValue = curl_exec($ch);
        return simplexml_load_string($retValue);
    }

    public function getText()
    {
        return "exchangerates";
    }
}