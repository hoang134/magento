<?php

namespace CreateApi\CustomApi\Model\Api;

use CreateApi\CustomApi\Api\CustomInterface;
use Psr\Log\LoggerInterface;
use Magento\Catalog\Model\Product;

class Custom extends \Magento\Framework\View\Element\Template implements CustomInterface
{
    protected $logger;
    protected $productRepository;

    protected $productCollectionFactory;
    protected $categoryFactory;



    public function __construct(LoggerInterface $logger, \Magento\Catalog\Model\ProductRepository $productRepository,

                                \Magento\Framework\View\Element\Template\Context $context,
                                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
                                \Magento\Catalog\Model\CategoryFactory $categoryFactory,
                                array $data = []                                                  )
    {
        $this->logger = $logger;
        $this->productRepository = $productRepository;

        $this->productCollectionFactory = $productCollectionFactory;
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }

    public function getProduct($id)
    {
        try {
            $product = $this->productRepository->getById($id);
            $response = ['success' => true, 'product' => $product->toArray()];
            return json_encode($response);
        } catch (\Exception $exception) {
            $response = ['success' => false, 'message' => $exception->getMessage()];
            $this->logger->info($exception->getMessage());
            return json_encode($response);
        }
    }

    public function getProducts()
    {
        try {
            $collection = $this->productCollectionFactory->create();
            $collection->addAttributeToSelect('*');

            return $collection->getData();
        } catch (\Exception $exception) {
            $response = ['success' => false, 'message' => $exception->getMessage()];
            $this->logger->info($exception->getMessage());
            return json_encode($response);
        }

    }

}
