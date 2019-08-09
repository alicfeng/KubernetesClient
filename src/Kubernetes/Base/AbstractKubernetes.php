<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Value comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 * AlicFeng | a@samego.com
 */

namespace AlicFeng\Kubernetes\Base;

use GuzzleHttp\Client;

abstract class AbstractKubernetes extends Client
{
    /*resource type*/
    const TYPE_SERVICE    = 'Service';
    const TYPE_DEPLOYMENT = 'Deployment';
    const TYPE_POD        = 'Pod';
    const TYPE_JOB        = 'Job';

    /*resource type about apiVersion and kind*/
    public static $resourceTypes = [
        self::TYPE_POD        => [
            'api_version' => 'v1',
            'kind'        => 'Pod',
        ],
        self::TYPE_DEPLOYMENT => [
            'api_version' => 'apps/v1',
            'kind'        => 'Deployment',
        ],
        self::TYPE_SERVICE    => [
            'api_version' => 'v1',
            'kind'        => 'Service',
        ],
        self::TYPE_JOB => [
            'api_version' => 'batch/v1',
            'kind'        => 'Job',
        ],
    ];
}
