<?php

namespace Dp\LeasewebApiBundle\Api;

use Lsw\ApiCallerBundle\Call\HttpDeleteJson;
use Lsw\ApiCallerBundle\Call\HttpGetJson;
use Lsw\ApiCallerBundle\Call\HttpPostJson;
use Lsw\ApiCallerBundle\Call\HttpPutJson;

/**
 * LeaseWeb Operating Systems API
 * http://developer.leaseweb.com/api-docs/?php#operating-systems
 *
 * @author Denis Pavluchenko <den.pavl@gmail.com>
 */
class OperatingSystemsApi extends AbstractApiCall
{
    /**
     * API resource
     */
    const RESOURCE = 'operatingSystems';

    /**
     * List all Operating Systems
     * http://developer.leaseweb.com/api-docs/?php#list-all-operating-systems
     *
     * @return object|array
     */
    public function getOperatingSystems()
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s', $this->apiUrl, self::RESOURCE),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve an Operating Systems
     * http://developer.leaseweb.com/api-docs/?php#retrieve-an-operating-systems
     *
     * @param $operatingSystemId
     * @return object|array
     */
    public function getOperatingSystem($operatingSystemId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d', $this->apiUrl, self::RESOURCE, $operatingSystemId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * List all Control Panels
     * http://developer.leaseweb.com/api-docs/?php#list-all-control-panels
     *
     * @param $operatingSystemId
     * @return object|array
     */
    public function getControlPanels($operatingSystemId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/controlPanels', $this->apiUrl, self::RESOURCE, $operatingSystemId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve a Control Panel
     * http://developer.leaseweb.com/api-docs/?php#retrieve-a-control-panel
     *
     * @param $operatingSystemId
     * @param $controlPanelId
     * @return object|array
     */
    public function getControlPanel($operatingSystemId, $controlPanelId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/controlPanels/%d', $this->apiUrl, self::RESOURCE, $operatingSystemId, $controlPanelId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve a Partition Schema
     * http://developer.leaseweb.com/api-docs/?php#retrieve-a-partition-schema
     *
     * @param $operatingSystemId
     * @param $bareMetalId
     * @return object|array
     */
    public function getPartitionSchema($operatingSystemId, $bareMetalId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/partitionSchema?serverPackId', $this->apiUrl, self::RESOURCE, $operatingSystemId),
            array(
                'serverPackId' => $bareMetalId,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }
}
