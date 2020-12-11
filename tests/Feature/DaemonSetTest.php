<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Feature;

use AlicFeng\Kubernetes\Kubernetes;
use Tests\TestCase;

class DaemonSetTest extends TestCase
{
    public function testCreat(): void
    {
        $response = Kubernetes::daemonSet(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->setMetadata([
                'name' => 'daemonset-example',
            ])
            ->setSpec([
                'selector' => [
                    'matchLabels' => [
                        'app' => 'daemonset-example',
                    ],
                ],
                'template' => [
                    'metadata' => [
                        'labels' => [
                            'app' => 'daemonset-example',
                        ],
                    ],
                    'spec'     => [
                        'containers' => [
                            [
                                'name'  => 'nginx',
                                'image' => 'hub.c.163.com/library/nginx:latest',
                            ],
                        ],
                    ],
                ], ])->create();

        $this->assertKubernetesResponse($response);
    }

    public function testList(): void
    {
        $response = Kubernetes::daemonSet(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->list();

        $this->assertKubernetesResponse($response);
    }

    public function testListAllNamespace(): void
    {
        $response = Kubernetes::daemonSet(self::getKubernetesConfig())
            ->list(true);

        $this->assertKubernetesResponse($response);
    }

    public function testQueryStatus(): void
    {
        $response = Kubernetes::daemonSet(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->queryStatus('daemonset-example');

        $this->assertKubernetesResponse($response);
    }

    public function testRepair(): void
    {
        $response = Kubernetes::daemonSet(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->repair('daemonset-example', [
                'spec' => [
                    'template' => [
                        'metadata' => [
                            'labels' => [
                                'version' => '1.0.0',
                            ],
                        ],
                    ],
                ],
            ]);

        $this->assertKubernetesResponse($response);
    }

    public function testDelete(): void
    {
        $response = Kubernetes::daemonSet(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->remove('daemonset-example');

        $this->assertKubernetesResponse($response);
    }
}
