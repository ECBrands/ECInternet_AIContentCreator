<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\AIContentCreator\Model;

use Magento\Framework\HTTP\Client\Curl;
use ECInternet\AIContentCreator\Helper\Data;
use ECInternet\AIContentCreator\Logger\Logger;

class Client
{
    private const API_URL_CHAT_COMPLETION = 'https://api.openai.com/v1/chat/completions';

    /**
     * @var \Magento\Framework\HTTP\Client\Curl
     */
    private $_curl;

    /**
     * @var \ECInternet\AIContentCreator\Helper\Data
     */
    private $_helper;

    /**
     * @var \ECInternet\AIContentCreator\Logger\Logger
     */
    private $_logger;

    /**
     * Client constructor.
     *
     * @param \Magento\Framework\HTTP\Client\Curl        $curl
     * @param \ECInternet\AIContentCreator\Helper\Data   $helper
     * @param \ECInternet\AIContentCreator\Logger\Logger $logger
     */
    public function __construct(
        Curl $curl,
        Data $helper,
        Logger $logger
    ) {
        $this->_curl   = $curl;
        $this->_helper = $helper;
        $this->_logger = $logger;

        $this->curlInit();
    }

    public function getModelsList()
    {
        $this->log('getModelsList()');
    }

    public function makeChatCompletionRequest($request)
    {
        $this->log('makeChatCompletionRequest()');

        return $this->curlPost(self::API_URL_CHAT_COMPLETION, $request);
    }

    private function curlInit()
    {
        $this->log('curlInit()');

        $this->getCurlClient()->addHeader('Content-Type', 'application/json');
        $this->getCurlClient()->addHeader('Authorization', 'Bearer ' . $this->_helper->getOpenAiApiKey());
    }

    /**
     * Make a POST call using cURL
     *
     * @param string       $url
     * @param array|string $params
     *
     * @return string
     */
    private function curlPost(string $url, $params)
    {
        $this->log('curlPost()', ['url' => $url]);

        $this->getCurlClient()->post($url, $params);
        return $this->getCurlClient()->getBody();
    }

    private function getCurlClient()
    {
        return $this->_curl;
    }

    private function log(string $message, array $extra = [])
    {
        $this->_logger->info('Model/Client - ' . $message, $extra);
    }
}