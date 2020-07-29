<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\Base;

use GuzzleHttp\Client;

abstract class AbstractKubernetes extends Client
{
    /*resource type*/
    const TYPE_SERVICE                 = 'Service';
    const TYPE_DEPLOYMENT              = 'Deployment';
    const TYPE_POD                     = 'Pod';
    const TYPE_JOB                     = 'Job';
    const TYPE_CONFIG_MAP              = 'ConfigMap';
    const TYPE_PERSISTENT_VOLUME_CLAIM = 'PersistentVolumeClaim';
    const TYPE_INGRESS                 = 'Ingress';
    const TYPE_SECRET                  = 'Secret';
    const TYPE_NODE                    = 'Node';

    /*resource type about apiVersion and kind*/
    public static $resourceTypes = [
        self::TYPE_POD                     => [
            'api_version' => 'v1',
            'kind'        => self::TYPE_POD,
        ],
        self::TYPE_DEPLOYMENT              => [
            'api_version' => 'apps/v1',
            'kind'        => self::TYPE_DEPLOYMENT,
        ],
        self::TYPE_SERVICE                 => [
            'api_version' => 'v1',
            'kind'        => self::TYPE_SERVICE,
        ],
        self::TYPE_JOB                     => [
            'api_version' => 'batch/v1',
            'kind'        => self::TYPE_JOB,
        ],
        self::TYPE_CONFIG_MAP              => [
            'api_version' => 'v1',
            'kind'        => self::TYPE_CONFIG_MAP,
        ],
        self::TYPE_PERSISTENT_VOLUME_CLAIM => [
            'api_version' => 'v1',
            'kind'        => self::TYPE_PERSISTENT_VOLUME_CLAIM,
        ],
        self::TYPE_INGRESS                 => [
            'api_version' => 'extensions/v1beta1',
            'kind'        => self::TYPE_INGRESS,
        ],
        self::TYPE_SECRET                  => [
            'api_version' => 'v1',
            'kind'        => self::TYPE_SECRET,
        ],
        self::TYPE_NODE                    => [
            'api_version' => 'v1',
            'kind'        => self::TYPE_NODE,
        ],
    ];
}
