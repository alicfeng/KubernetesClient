<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\Facade;

use AlicFeng\Kubernetes\Contract\KubernetesInterface;
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
use Illuminate\Support\Facades\Facade;

/**
 * Class Kubernetes.
 *
 * @method static ConfigMap                  configMap()
 * @method static Service                    service()
 * @method static DaemonSet                  daemonSet()
 * @method static Deployment                 deployment()
 * @method static Event                      event()
 * @method static Ingress                    ingress()
 * @method static Job                        job()
 * @method static Node                       node()
 * @method static PersistentVolumeClaim      persistentVolumeClaim()
 * @method static Pod                        pod()
 * @method static ReplicationController      replicationController()
 * @method static Secrets                    secrets()
 * @method static StatefulSet                statefulSet()
 * @method static NetworkingIngress          networkingIngress()
 */
class Kubernetes extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return KubernetesInterface::class;
    }
}
