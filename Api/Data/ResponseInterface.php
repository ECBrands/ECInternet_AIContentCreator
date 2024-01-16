<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\AIContentCreator\Api\Data;

interface ResponseInterface
{
    public const FINISH_REASON_STOP          = 'stop';

    public const FINISH_REASON_LENGTH        = 'length';

    public const FINISH_REASON_FUNCTIONCALL  = 'function_call';

    public const FINISH_REASON_CONTENTFILTER = 'content_filter';

    public const FINISH_REASON_NULL          = 'null';

    /**
     * Unique response ID assigned by OpenAI.
     * Can be used to track interactions between API and users
     *
     * @return string
     */
    public function getResponseId();

    /**
     * Type of task performed
     *
     * @return string
     */
    public function getObject();

    /**
     * Timestamp of the creation of the response
     *
     * @return int
     */
    public function getCreated();

    /**
     * Model used to generate the response
     *
     * @return string
     */
    public function getModelName();

    /**
     * Information about length of the response in tokens.
     * Can be used to monitor API cost.
     *
     * @return array
     */
    public function getUsage();

    /**
     * Main API payload
     *
     * @return array
     */
    public function getChoices();
}