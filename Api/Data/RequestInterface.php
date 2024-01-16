<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\AIContentCreator\Api\Data;

interface RequestInterface
{
    public const MODEL_35_TURBO = 'gpt-3.5-turbo';

    public const MODEL_40       = 'gtp-4';

    /**
     * @return string
     */
    public function getApikey();

    /**
     * @return string
     */
    public function getModel();

    /**
     * @return array
     */
    public function getMessage();

    /**
     * @return float
     */
    public function getTemperature();

    /**
     * @return int
     */
    public function getMaxTokens();
}