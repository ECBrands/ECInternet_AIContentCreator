<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\AIContentCreator\Helper;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use ECInternet\AIContentCreator\Logger\Logger;
use Exception;

/**
 * Helper
 */
class Data extends AbstractHelper
{
    private const CONFIG_PATH_API_KEY   = 'ecinternet/aicontentcreator/openai_api_key';

    private const CONFIG_PATH_API_MODEL = 'ecinternet/aicontentcreator/openai_model';

    /**
     * @var \ECInternet\AIContentCreator\Logger\Logger
     */
    protected $_logger;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $_productRepository;

    /**
     * Data constructor.
     *
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param \Magento\Framework\App\Helper\Context           $context
     * @param \ECInternet\AIContentCreator\Logger\Logger      $logger
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        Context $context,
        Logger $logger
    ) {
        parent::__construct($context);

        $this->_productRepository = $productRepository;
        $this->_logger            = $logger;
    }

    public function getOpenAiApiKey()
    {
        return (string)$this->scopeConfig->getValue(self::CONFIG_PATH_API_KEY);
    }

    public function getOpenAiModel()
    {
        return (string)$this->scopeConfig->getValue(self::CONFIG_PATH_API_MODEL);
    }

    public function getProductDescriptionForPrompt(int $productId)
    {
        if ($product = $this->getProductById($productId)) {
            $details = [];

            if ($sku = $product->getSku()) {
                $details[] = 'SKU: ' . $sku;
            }

            if ($name = $product->getName()) {
                $details[] = 'Name: ' . $name;
            }

            if ($manufacturer = $product->getData('manufacturer')) {
                $details[] = 'Manufacturer: ' . $manufacturer;
            }

            return implode('\n', $details);
        }

        return null;
    }

    private function getProductById(int $productId)
    {
        try {
            return $this->_productRepository->getById($productId);
        } catch (Exception $e) {
        }

        return null;
    }

    /**
     * Write to extension log
     *
     * @param string $message
     * @param array  $extra
     *
     * @return void
     */
    private function log(string $message, array $extra = [])
    {
        $this->_logger->info('Helper/Data - ' . $message, $extra);
    }
}
