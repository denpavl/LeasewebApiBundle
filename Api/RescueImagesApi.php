<?php

namespace Dp\LeasewebApiBundle\Api;

use Lsw\ApiCallerBundle\Call\HttpDeleteJson;
use Lsw\ApiCallerBundle\Call\HttpGetJson;
use Lsw\ApiCallerBundle\Call\HttpPostJson;
use Lsw\ApiCallerBundle\Call\HttpPutJson;

/**
 * LeaseWeb Rescue Images API
 * http://developer.leaseweb.com/api-docs/?php#rescue-images
 *
 * @author Denis Pavluchenko <den.pavl@gmail.com>
 */
class RescueImagesApi extends AbstractApiCall
{
    /**
     * API resource
     */
    const RESOURCE = 'rescueImages';

    /**
     * List your Recue Images
     * http://developer.leaseweb.com/api-docs/?php#list-your-recue-images
     *
     * @return object|array
     */
    public function getRescueImages()
    {
        return $this->apiCaller->call(new HttpGetJson(
            sprintf('%s/%s', $this->apiUrl, self::RESOURCE),
            array(),
            $this->asAssociativeArray,
            $this->getOptions()
        ));
    }
}
