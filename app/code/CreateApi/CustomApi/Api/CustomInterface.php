<?php

namespace CreateApi\CustomApi\Api;

interface CustomInterface
{
    /**
     * GET for Product api
     * @param string $id
     * @return string
     */
    public function getProduct($id);

    /**
     * GET for Products api
     * @return string
     */
    public function getProducts();
}