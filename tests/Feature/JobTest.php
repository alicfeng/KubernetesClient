<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Feature;

use AlicFeng\Kubernetes\Kubernetes;
use Tests\TestCase;

class JobTest extends TestCase
{
    public function testCreate()
    {
        $response = Kubernetes::job(self::getKubernetesConfig())
            ->setApiVersion('batch/v1')
            ->setKind('Job')
            ->setNamespace($this->getNamespace())
            ->setMetadata([
                'name' => 'testing-job',
            ])
            ->setSpec([
                'template' => [
                    'metadata' => [
                        'name' => 'testing-job',
                    ],
                    'spec'     => [
                        'containers'    => [
                            [
                                'name'    => 'testing-job',
                                'image'   => 'busybox',
                                'command' => [
                                    'ls',
                                ],
                            ],
                        ],
                        'restartPolicy' => 'Never',
                    ],
                ],
            ])->create();

        $this->assertKubernetesResponse($response);
    }

    public function testList()
    {
        $response = Kubernetes::job(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->list();

        $this->assertKubernetesResponse($response);
    }

    public function testListAllNamespace()
    {
        $response = Kubernetes::job(self::getKubernetesConfig())
            ->list(true);

        $this->assertKubernetesResponse($response);
    }

    public function testQueryStatus()
    {
        $response = Kubernetes::job(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->queryStatus('testing-job');

        $this->assertKubernetesResponse($response);
    }

    public function testRepair()
    {
        $response = Kubernetes::job(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->repair('testing-job', [
                'spec' => [
                    'parallelism' => 2,
                ],
            ]);

        $this->assertKubernetesResponse($response);
    }

    public function testDelete()
    {
        $response = Kubernetes::job(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->remove('testing-job');

        $this->assertKubernetesResponse($response);
    }
}
