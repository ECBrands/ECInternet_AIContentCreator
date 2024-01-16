<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\AIContentCreator\Api\Data;

interface RequestUsageInterface
{
    /**
     * @return int
     */
    public function getPromptTokenCount();

    /**
     * @return int
     */
    public function getCompletionTokenCount();

    /**
     * @return int
     */
    public function getTotalTokenCount();
}