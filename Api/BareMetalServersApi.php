<?php

namespace Dp\LeasewebApiBundle\Api;

use Lsw\ApiCallerBundle\Call\HttpDeleteJson;
use Lsw\ApiCallerBundle\Call\HttpGetJson;
use Lsw\ApiCallerBundle\Call\HttpPostJson;
use Lsw\ApiCallerBundle\Call\HttpPutJson;

/**
 * LeaseWeb Bare Metal Servers API
 * http://developer.leaseweb.com/api-docs/?php#bare-metal-servers
 *
 * @author Denis Pavluchenko <den.pavl@gmail.com>
 */
class BareMetalServersApi extends AbstractApiCall
{
    /**
     * API resource
     */
    const RESOURCE = 'bareMetals';

    /**
     * List your Bare Metal servers
     * http://developer.leaseweb.com/api-docs/?php#list-your-bare-metal-servers
     *
     * @return object|array
     */
    public function getBareMetals()
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s', $this->apiUrl, self::RESOURCE),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve a Bare Metal server
     * http://developer.leaseweb.com/api-docs/?php#retrieve-a-bare-metal-server
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function getBareMetal($bareMetalId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Update a Bare Metal server
     * http://developer.leaseweb.com/api-docs/?php#update-a-bare-metal-server
     *
     * @param $bareMetalId
     * @param $reference
     * @return object|array
     */
    public function updateBareMetal($bareMetalId, $reference)
    {
        return $this->apiCaller->call(new HttpPutJson(
            sprintf('%s/%s/%d', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(
                'reference' => $reference,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve switchport status
     * http://developer.leaseweb.com/api-docs/?php#retrieve-switchport-status
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function getSwitchPort($bareMetalId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/switchPort', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Open the switch port
     * http://developer.leaseweb.com/api-docs/?php#open-the-switch-port
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function postSwitchPortOpen($bareMetalId)
    {
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s/%d/switchPort/open', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Close the switch port
     * http://developer.leaseweb.com/api-docs/?php#close-the-switch-port
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function postSwitchPortClose($bareMetalId)
    {
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s/%d/switchPort/close', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve power status
     * http://developer.leaseweb.com/api-docs/?php#retrieve-power-status
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function getPowerStatus($bareMetalId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/powerStatus', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * List all IPs
     * http://developer.leaseweb.com/api-docs/?php#list-all-ips
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function getIPs($bareMetalId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/ips', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve an IP
     * http://developer.leaseweb.com/api-docs/?php#retrieve-an-ip
     *
     * @param $bareMetalId
     * @param $ipAddress
     * @return object|array
     */
    public function getIP($bareMetalId, $ipAddress)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/ips/%s', $this->apiUrl, self::RESOURCE, $bareMetalId, $ipAddress),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Update an IP
     * http://developer.leaseweb.com/api-docs/?php#update-an-ip
     *
     * @param $bareMetalId
     * @param $ipAddress
     * @param string $reverseLookup
     * @param int $nullRouted
     * @return object|array
     */
    public function updateIP($bareMetalId, $ipAddress, $reverseLookup = '', $nullRouted = 0)
    {
        return $this->apiCaller->call(new HttpPutJson(
            sprintf('%s/%s/%d/ips/%s', $this->apiUrl, self::RESOURCE, $bareMetalId, $ipAddress),
            array(
                'nullRouted' => $nullRouted,
                'reverseLookup' => $reverseLookup,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve network usage
     * http://developer.leaseweb.com/api-docs/?php#retrieve-network-usage
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function getNetworkUsage($bareMetalId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/networkUsage', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve bandwidth usage
     * http://developer.leaseweb.com/api-docs/?php#retrieve-bandwidth-usage
     *
     * @param $bareMetalId
     * @param $dateFrom
     * @param $dateTo
     * @param string $format
     * @return object|array
     */
    public function getNetworkUsageBandWidth($bareMetalId, $dateFrom, $dateTo, $format = 'json')
    {
        // @TODO: add support for $dateFrom, $dateTo, $format
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/networkUsage/bandwidth', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve datatraffic usage
     * http://developer.leaseweb.com/api-docs/?php#retrieve-datatraffic-usage
     *
     * @param $bareMetalId
     * @param $dateFrom
     * @param $dateTo
     * @param string $format
     * @return object|array
     */
    public function getNetworkUsageDataTraffic($bareMetalId, $dateFrom, $dateTo, $format = 'json')
    {
        // @TODO: add support for $dateFrom, $dateTo, $format
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/networkUsage/dataTraffic', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Reboot a server
     * http://developer.leaseweb.com/api-docs/?php#reboot-a-server
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function postReboot($bareMetalId)
    {
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s/%d/powerCycle', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Launch a re-installation
     * http://developer.leaseweb.com/api-docs/?php#launch-a-re-installation
     *
     * @param $bareMetalId
     * @param $osId
     * @param array $hdd
     * @return object|array
     */
    public function installServer($bareMetalId, $osId, $hdd = [])
    {
        // @TODO: add support for $hdd
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s/%d/install', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(
                'osId' => $osId,
                //'hdd' => $hdd,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Launch rescue mode
     * http://developer.leaseweb.com/api-docs/?php#launch-rescue-mode
     *
     * @param $bareMetalId
     * @param $osId
     * @return object|array
     */
    public function postResqueMode($bareMetalId, $osId)
    {
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s/%d/rescueMode', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(
                'osId' => $osId,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve root password
     * http://developer.leaseweb.com/api-docs/?php#retrieve-root-password
     *
     * @param $bareMetalId
     * @param string $format
     * @return object|array
     */
    public function getRootPassword($bareMetalId, $format = 'json')
    {
        // @TODO: add support for $format
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/rootPassword', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve installation status
     * http://developer.leaseweb.com/api-docs/?php#retrieve-installation-status
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function getInstallationStatus($bareMetalId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/installationStatus', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve a list of DHCP leases
     * http://developer.leaseweb.com/api-docs/?php#retrieve-a-list-of-dhcp-leases
     *
     * @param $bareMetalId
     * @return object|array
     */
    public function getLeases($bareMetalId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s/%d/leases', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Create a new DHCP lease
     * http://developer.leaseweb.com/api-docs/?php#create-a-new-dhcp-lease
     *
     * @param $bareMetalId
     * @param $bootFileName
     * @param $bootServerHost
     * @param $domainNameServerIp
     * @return object|array
     */
    public function setLease($bareMetalId, $bootFileName, $bootServerHost, $domainNameServerIp)
    {
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s/%d/leases', $this->apiUrl, self::RESOURCE, $bareMetalId),
            array(
                'bootfile_name' => $bootFileName,
                'boot_server_host' => $bootServerHost,
                'domain_name_server_ip' => $domainNameServerIp,
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve a DHCP lease
     * http://developer.leaseweb.com/api-docs/?php#retrieve-a-dhcp-lease
     *
     * @param $bareMetalId
     * @param $macAddress
     * @return object|array
     */
    public function getLease($bareMetalId, $macAddress)
    {
        return $this->apiCaller->call(new HttpPostJson(
            sprintf('%s/%s/%d/leases/%s', $this->apiUrl, self::RESOURCE, $bareMetalId, $macAddress),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Delete a DHCP lease
     * http://developer.leaseweb.com/api-docs/?php#delete-a-dhcp-lease
     *
     * @param $bareMetalId
     * @param $macAddress
     * @return mixed
     */
    public function deleteLease($bareMetalId, $macAddress)
    {
        return $this->apiCaller->call(new HttpDeleteJson(
            sprintf('%s/%s/%d/leases/%s', $this->apiUrl, self::RESOURCE, $bareMetalId, $macAddress),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }
}
