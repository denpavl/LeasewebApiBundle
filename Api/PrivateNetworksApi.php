<?php

namespace Dp\LeasewebApiBundle\Api;

use Lsw\ApiCallerBundle\Call\HttpDeleteJson;
use Lsw\ApiCallerBundle\Call\HttpGetJson;
use Lsw\ApiCallerBundle\Call\HttpPostJson;
use Lsw\ApiCallerBundle\Call\HttpPutJson;

/**
 * LeaseWeb Private Networks API
 * http://developer.leaseweb.com/api-docs/?php#private-networks
 *
 * @author Denis Pavluchenko <den.pavl@gmail.com>
 */
class PrivateNetworksApi extends AbstractApiCall
{
    /**
     * API resource
     */
    const RESOURCE = 'privateNetworks';

    /**
     * List your Private Networks
     * http://developer.leaseweb.com/api-docs/?php#list-your-private-networks
     *
     * @return object|array
     */
    public function getPrivateNetworks()
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s', $this->apiUrl, self::RESOURCE),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Create a Private Network
     * http://developer.leaseweb.com/api-docs/?php#create-a-private-network
     *
     * @param string $name
     * @return object|array
     */
    public function createPrivateNetworks($name = '')
    {
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s', $this->apiUrl, self::RESOURCE),
            array(
                'name' => $name,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve a Private Network
     * http://developer.leaseweb.com/api-docs/?php#retrieve-a-private-network
     *
     * @param $privateNetworkId
     * @return object|array
     */
    public function getPrivateNetwork($privateNetworkId)
    {
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s/%d', $this->apiUrl, self::RESOURCE, $privateNetworkId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Update a Private Network
     * https://github.com/LeaseWeb/leaseweb-rest-api/blob/master/lib/leaseweb-rest-api.rb#L200
     *
     * @param $privateNetworkId
     * @param string $name
     * @return mixed
     */
    public function updatePrivateNetwork($privateNetworkId, $name = '')
    {
        return $this->apiCaller->call(new HttpPutJson(
            sprintf('%s/%s/%d', $this->apiUrl, self::RESOURCE, $privateNetworkId),
            array(
                'name' => $name,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Delete a Private Network
     * http://developer.leaseweb.com/api-docs/?php#delete-a-private-network
     *
     * @param $privateNetworkId
     * @return object|array
     */
    public function deletePrivateNetwork($privateNetworkId)
    {
        return $this->apiCaller->call(new HttpDeleteJson(
            sprintf('%s/%s/%d', $this->apiUrl, self::RESOURCE, $privateNetworkId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Add a bare metal server
     * http://developer.leaseweb.com/api-docs/?php#add-a-bare-metal-server
     *
     * @param $privateNetworkId
     * @param $bareMetalId
     * @return object|array
     */
    public function createPrivateNetworksBareMetals($privateNetworkId, $bareMetalId)
    {
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s/%d/bareMetals', $this->apiUrl, self::RESOURCE, $privateNetworkId),
            array(
                'bareMetalId' => $bareMetalId,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Remove a bare metal server
     * http://developer.leaseweb.com/api-docs/?php#remove-a-bare-metal-server
     *
     * @param $privateNetworkId
     * @param $bareMetalId
     * @return object|array
     */
    public function deletePrivateNetworksBareMetals($privateNetworkId, $bareMetalId)
    {
        return $this->apiCaller->call(new HttpDeleteJson(
            sprintf('%s/%s/%d/bareMetals/%d', $this->apiUrl, self::RESOURCE, $privateNetworkId, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }
}
