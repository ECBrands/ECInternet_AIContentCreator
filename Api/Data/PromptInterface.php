<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\AIContentCreator\Api\Data;

interface PromptInterface
{
    public function getId();

    public function getContent();
}