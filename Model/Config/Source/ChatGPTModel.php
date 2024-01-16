<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\AIContentCreator\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use ECInternet\AIContentCreator\Api\Data\RequestInterface;

class ChatGPTModel implements OptionSourceInterface
{
    public function toOptionArray()
    {
        // TODO: use Helper.getModelList()
        return [
            ['value' => RequestInterface::MODEL_35_TURBO, 'label' => 'GPT-3.5 Turbo'],
            ['value' => RequestInterface::MODEL_40,       'label' => 'GPT-4']
        ];
    }
}