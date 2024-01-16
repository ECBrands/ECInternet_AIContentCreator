<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\AIContentCreator\Api\Data;

interface RequestMessageInterface
{
    /**
     * Get message role (required)
     *
     * @return string
     */
    public function getRole();

    /**
     * Get message content (required)
     *
     * @return string
     */
    public function getContent();

    /**
     * Get message author (optional)
     *
     * @return string
     */
    public function getName();
}