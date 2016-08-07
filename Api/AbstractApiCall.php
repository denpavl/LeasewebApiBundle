<?php

namespace Dp\LeasewebApiBundle\Api;

use Lsw\ApiCallerBundle\Caller\ApiCallerInterface;

/**
 * Abstract class of API Call
 *
 * @author Denis Pavluchenko <den.pavl@gmail.com>
 */
abstract class AbstractApiCall
{
    /**
     * @var ApiCallerInterface $apiCaller
     */
    protected $apiCaller;

    /**
     * @var $apiUrl
     */
    protected $apiUrl;

    /**
     * @var $apiKey
     */
    protected $apiKey;

    /**
     * @var $asAssociativeArray
     */
    protected $asAssociativeArray;

    /**
     * Constructor
     *
     * @param $apiCaller
     * @param $apiUrl
     * @param $apiKey
     * @param $asAssociativeArray
     */
    public function __construct($apiCaller, $apiUrl, $apiKey, $asAssociativeArray)
    {
        $this->apiCaller = $apiCaller;
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
        $this->asAssociativeArray = $asAssociativeArray;
    }

    /**
     * Return cURL options for request
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            'HTTPHEADER' => array('X-Lsw-Auth' => $this->apiKey),
        );
    }
}
