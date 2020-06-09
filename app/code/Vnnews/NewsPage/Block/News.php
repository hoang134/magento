<?php

namespace Vnnews\NewsPage\Block;

use Magento\Framework\View\Element\Template;

class News extends Template
{


    public function getNews()
    {
        $url = 'https://vnexpress.net/rss/cuoi.rss';
        $data = simplexml_load_file($url);
        return $data;
    }
}
