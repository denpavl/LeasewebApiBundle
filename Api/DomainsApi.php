<?php

namespace Dp\LeasewebApiBundle\Api;

use Lsw\ApiCallerBundle\Call\HttpDeleteJson;
use Lsw\ApiCallerBundle\Call\HttpGetJson;
use Lsw\ApiCallerBundle\Call\HttpPostJson;
use Lsw\ApiCallerBundle\Call\HttpPutJson;

/**
 * LeaseWeb Domains API
 * http://developer.leaseweb.com/api-docs/?php#domains
 *
 * @author Denis Pavluchenko <den.pavl@gmail.com>
 */
class DomainsApi extends AbstractApiCall
{
    /**
     * API resource
     */
    const RESOURCE = 'domains';

    /**
     * List your Domains
     * http://developer.leaseweb.com/api-docs/?php#list-your-domains
     *
     * @return object|array
     */
    public function getDomains()
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s', $this->apiUrl, self::RESOURCE),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve a Domain
     * http://developer.leaseweb.com/api-docs/?php#retrieve-a-domain
     *
     * @param $domain
     * @return object|array
     */
    public function getDomain($domain)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprinf('%s/%s/%s', $this->apiUrl, self::RESOURCE, $domain),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Update a Domain
     * http://developer.leaseweb.com/api-docs/?php#update-a-domain
     *
     * @param $domain
     * @param $ttl
     * @return object|array
     */
    public function updateDomain($domain, $ttl)
    {
        return $this->apiCaller->call(new HttpPutJson(
            sprinf('%s/%s/%s', $this->apiUrl, self::RESOURCE, $domain),
            array(
                'ttl' => $ttl
            ),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * List all Domain Records
     * http://developer.leaseweb.com/api-docs/?php#list-all-domain-records
     *
     * @param $domain
     * @return object|array
     */
    public function getDNSRecords($domain)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprinf('%s/%s/%s/dnsRecords', $this->apiUrl, self::RESOURCE, $domain),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Create a new DNS Record
     * http://developer.leaseweb.com/api-docs/?php#create-a-new-dns-record
     *
     * @param $domain
     * @param $host
     * @param $content
     * @param $type
     * @param null $priority
     * @return object|array
     */
    public function createDNSRecords($domain, $host, $content, $type, $priority = null)
    {
        $data = array(
            'host' => $host,
            'type' => $type,
            'content' => $content,
        );

        if ($priority !== null && ($type == 'MX' || $type == 'SRV')) {
            $data['priority'] = $priority;
        }

        return $this->apiCaller->call(new HttpPostJson(
            sprinf('%s/%s/%s/dnsRecords', $this->apiUrl, self::RESOURCE, $domain),
            $data,
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Retrieve a DNS Record
     * http://developer.leaseweb.com/api-docs/?php#retrieve-a-dns-record
     *
     * @param $domain
     * @param $dnsRecordId
     * @return object|array
     */
    public function getDNSRecord($domain, $dnsRecordId)
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprinf('%s/%s/%s/dnsRecords/%d', $this->apiUrl, self::RESOURCE, $domain, $dnsRecordId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Update a DNS Record
     * http://developer.leaseweb.com/api-docs/?php#update-a-dns-record
     *
     * @param $domain
     * @param $dnsRecordId
     * @param $host
     * @param $content
     * @param $type
     * @param null $priority
     * @return object|array
     */
    public function updateDNSRecord($domain, $dnsRecordId, $host, $content, $type, $priority = null)
    {
        $data = array(
            'id' => $dnsRecordId,
            'host' => $host,
            'type' => $type,
            'content' => $content,
        );

        if ($priority !== null && ($type == 'MX' || $type == 'SRV')) {
            $data['priority'] = $priority;
        }

        return $this->apiCaller->call(new HttpPutJson(
            sprinf('%s/%s/%s/dnsRecords/%d', $this->apiUrl, self::RESOURCE, $domain, $dnsRecordId),
            $data,
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }

    /**
     * Remove a DNS Record
     * http://developer.leaseweb.com/api-docs/?php#remove-a-dns-record
     *
     * @param $domain
     * @param $dnsRecordId
     * @return object|array
     */
    public function deleteDNSRecord($domain, $dnsRecordId)
    {
        return $this->apiCaller->call(new HttpDeleteJson(
            sprinf('%s/%s/%s/dnsRecords/%d', $this->apiUrl, self::RESOURCE, $domain, $dnsRecordId),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }
}
