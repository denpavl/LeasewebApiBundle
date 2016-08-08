<?php

namespace Dp\LeasewebApiBundle\Api;

use Lsw\ApiCallerBundle\Call\HttpDeleteJson;
use Lsw\ApiCallerBundle\Call\HttpGetJson;
use Lsw\ApiCallerBundle\Call\HttpPostJson;
use Lsw\ApiCallerBundle\Call\HttpPutJson;

/**
 * LeaseWeb IPs API
 * http://developer.leaseweb.com/api-docs/?php#ips
 *
 * @author Denis Pavluchenko <den.pavl@gmail.com>
 */
class IpsApi extends AbstractApiCall
{
    /**
     * API resource
     */
    const RESOURCE = 'ips';

    /**
     * Get all your IPs
     * http://developer.leaseweb.com/api-docs/?php#get-all-your-ips
     *
     * @return object|array
     */
    public function getIps()
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s', $this->apiUrl, self::RESOURCE),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Get a single IP
     * http://developer.leaseweb.com/api-docs/?php#get-a-single-ip
     *
     * @param $ipAddress
     * @return object|array
     */
    public function getIp($ipAddress)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%s', $this->apiUrl, self::RESOURCE, $ipAddress),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Update a single IP
     * http://developer.leaseweb.com/api-docs/?php#update-a-single-ip
     *
     * @param $ipAddress
     * @param string $reverseLookup
     * @param int $nullRouted
     * @return object|array
     */
    public function updateIp($ipAddress, $reverseLookup = '', $nullRouted = 0)
    {
        return $this->apiCaller->call(new HttpPutJson(
            sprintf('%s/%s/%s', $this->apiUrl, self::RESOURCE, $ipAddress),
            array(
                'reverseLookup' => $reverseLookup,
                'nullRouted' => $nullRouted,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }
}
