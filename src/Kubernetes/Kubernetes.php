<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes;

use AlicFeng\Kubernetes\Kubernetes\ConfigMap;
use AlicFeng\Kubernetes\Kubernetes\DaemonSet;
use AlicFeng\Kubernetes\Kubernetes\Deployment;
use AlicFeng\Kubernetes\Kubernetes\Event;
use AlicFeng\Kubernetes\Kubernetes\Ingress;
use AlicFeng\Kubernetes\Kubernetes\Job;
use AlicFeng\Kubernetes\Kubernetes\NetworkingIngress;
use AlicFeng\Kubernetes\Kubernetes\Node;
use AlicFeng\Kubernetes\Kubernetes\PersistentVolumeClaim;
use AlicFeng\Kubernetes\Kubernetes\Pod;
use AlicFeng\Kubernetes\Kubernetes\ReplicationController;
use AlicFeng\Kubernetes\Kubernetes\Secrets;
use AlicFeng\Kubernetes\Kubernetes\Service;
use AlicFeng\Kubernetes\Kubernetes\StatefulSet;

/**
 * Class Kubernetes.
 *
 * @method static ConfigMap                  configMap(array $config)
 * @method static Service                    service(array $config)
 * @method static DaemonSet                  daemonSet(array $config)
 * @method static Deployment                 deployment(array $config)
 * @method static Event                      event(array $config)
 * @method static Ingress                    ingress(array $config)
 * @method static Job                        job(array $config)
 * @method static Node                       node(array $config)
 * @method static PersistentVolumeClaim      persistentVolumeClaim(array $config)
 * @method static Pod                        pod(array $config)
 * @method static ReplicationController      replicationController(array $config)
 * @method static Secrets                    secrets(array $config)
 * @method static StatefulSet                statefulSet(array $config)
 * @method static NetworkingIngress          networkingIngress(array $config)
 */
class Kubernetes
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @description make application container(obj)
     * @param string $name   server name
     * @param array  $config kubernetes configuration
     * @return mixed
     * @author      AlicFeng
     */
    private static function make(string $name, array $config)
    {
        $namespace   = ucfirst($name);
        $application = "\\AlicFeng\\Kubernetes\\Kubernetes\\{$namespace}";

        return new $application($config);
    }

    /**
     * @function    __call
     * @description dynamically pass methods to the application
     * @param $name
     * @param $arguments
     * @return mixed
     * @author      AlicFeng
     * @datatime    20-7-30 下午5:31
     */
    public function __call($name, $arguments)
    {
        return self::make($name, $this->config);
    }

    /**
     * @function    __callStatic
     * @description dynamically pass methods to the application
     * @param $name
     * @param $arguments
     * @return mixed
     * @author      AlicFeng
     * @datatime    20-7-30 下午5:31
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
