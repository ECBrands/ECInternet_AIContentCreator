<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\AIContentCreator\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

//TODO: Rename this class
class AllowedProductAttribute implements OptionSourceInterface
{
    private $_productAttributeCollectionFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory $productAttributeCollectionFactory
    ) {
        $this->_productAttributeCollectionFactory = $productAttributeCollectionFactory;
    }

    public function toOptionArray()
    {
        $options = [];

        /** @var \Magento\Catalog\Model\ResourceModel\Product\Attribute\Collection $productAttributes */
        $productAttributes = $this->getProductAttributes();
        foreach ($productAttributes->getItems() as $productAttribute) {
            /** @var \Magento\Catalog\Model\ResourceModel\Eav\Attribute $productAttribute */
            $options[] = [
                'value' => $productAttribute->getAttributeCode(),
                'label' => $productAttribute->getDefaultFrontendLabel()
            ];
        }

        return $options;
    }

    /**
     * @return \Magento\Catalog\Model\ResourceModel\Product\Attribute\Collection
     */
    private function getProductAttributes()
    {
        return $this->_productAttributeCollectionFactory->create()
            ->addFieldToFilter('backend_type', ['nin' => ['datetime']])
            ->addFieldToFilter('frontend_input', ['nin' => ['gallery', 'media_image', 'price']])
            ->addFieldToFilter('is_visible', ['eq' => 1])
            ->addFieldToFilter(['apply_to'], [['null' => true], ['like' => '%simple%']])
            ;
    }
}