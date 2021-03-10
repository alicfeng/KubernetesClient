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
    const TYPE_DAEMONSET               = 'DaemonSet';
    const TYPE_VIRTUAL_SERVICE         = 'VirtualService';
    const TYPE_GATEWAY                 = 'Gataway';

    /**
     * @var array kubernetes demo.api_version list
     */
    protected $api_versions = [];

    /**
     * @function    resourceTypes
     * @description resource type about apiVersion and kind
     * @author      AlicFeng
     * @datatime    21-3-8 上午10:46
     */
    public function resourceTypes(): array
    {
        return [
            self::TYPE_POD                     => [
                'api_version' => $this->api_versions['pod'] ?? 'v1',
                'kind'        => self::TYPE_POD,
            ],
            self::TYPE_DEPLOYMENT              => [
                'api_version' => $this->api_versions['pod'] ?? 'apps/v1',
                'kind'        => self::TYPE_DEPLOYMENT,
            ],
            self::TYPE_SERVICE                 => [
                'api_version' => $this->api_versions['pod'] ?? 'v1',
                'kind'        => self::TYPE_SERVICE,
            ],
            self::TYPE_JOB                     => [
                'api_version' => $this->api_versions['pod'] ?? 'batch/v1',
                'kind'        => self::TYPE_JOB,
            ],
            self::TYPE_CONFIG_MAP              => [
                'api_version' => $this->api_versions['pod'] ?? 'v1',
                'kind'        => self::TYPE_CONFIG_MAP,
            ],
            self::TYPE_PERSISTENT_VOLUME_CLAIM => [
                'api_version' => $this->api_versions['pod'] ?? 'v1',
                'kind'        => self::TYPE_PERSISTENT_VOLUME_CLAIM,
            ],
            self::TYPE_INGRESS                 => [
                'api_version' => $this->api_versions['pod'] ?? 'extensions/v1beta1',
                'kind'        => self::TYPE_INGRESS,
            ],
            self::TYPE_SECRET                  => [
                'api_version' => $this->api_versions['pod'] ?? 'v1',
                'kind'        => self::TYPE_SECRET,
            ],
            self::TYPE_NODE                    => [
                'api_version' => $this->api_versions['pod'] ?? 'v1',
                'kind'        => self::TYPE_NODE,
            ],
            self::TYPE_DAEMONSET               => [
                'api_version' => $this->api_versions['pod'] ?? 'apps/v1',
                'kind'        => self::TYPE_DAEMONSET,
            ],
            self::TYPE_VIRTUAL_SERVICE               => [
                'api_version' => $this->api_versions['virtual_service'] ?? 'networking.istio.io/v1alpha3',
                'kind'        => self::TYPE_VIRTUAL_SERVICE,
            ],
            self::TYPE_GATEWAY               => [
                'api_version' => $this->api_versions['gataway'] ?? 'networking.istio.io/v1alpha3',
                'kind'        => self::TYPE_GATEWAY,
            ],
        ];
    }
}
