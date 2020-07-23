<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Unit;

use AlicFeng\Kubernetes\Kubernetes;
use AlicFeng\Kubernetes\Kubernetes\ConfigMap;
use AlicFeng\Kubernetes\Kubernetes\DaemonSet;
use AlicFeng\Kubernetes\Kubernetes\Deployment;
use AlicFeng\Kubernetes\Kubernetes\Event;
use AlicFeng\Kubernetes\Kubernetes\Ingress;
use AlicFeng\Kubernetes\Kubernetes\Job;
use AlicFeng\Kubernetes\Kubernetes\Node;
use AlicFeng\Kubernetes\Kubernetes\PersistentVolumeClaim;
use AlicFeng\Kubernetes\Kubernetes\Pod;
use AlicFeng\Kubernetes\Kubernetes\ReplicationController;
use AlicFeng\Kubernetes\Kubernetes\Secrets;
use AlicFeng\Kubernetes\Kubernetes\Service;
use AlicFeng\Kubernetes\Kubernetes\StatefulSet;
use Tests\TestCase;

class AppObjectTest extends TestCase
{
    const RESOURCE_OBJS = [
        'configMap'             => ConfigMap::class,
        'daemonSet'             => DaemonSet::class,
        'deployment'            => Deployment::class,
        'event'                 => Event::class,
        'ingress'               => Ingress::class,
        'job'                   => Job::class,
        'node'                  => Node::class,
        'persistentVolumeClaim' => PersistentVolumeClaim::class,
        'pod'                   => Pod::class,
        'replicationController' => ReplicationController::class,
        'secrets'               => Secrets::class,
        'service'               => Service::class,
        'statefulSet'           => StatefulSet::class,
    ];

    // 测试资源对象生成
    public function testObjectCreate()
    {
        env('');
        foreach (self::RESOURCE_OBJS as $object => $class) {
            $configMap = Kubernetes::$object(static::kubernetesConfig());

            self::assertEquals(get_class($configMap), $class);
            self::assertNotNull($configMap);
            self::assertIsObject($configMap);
        }
    }
}
