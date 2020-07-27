<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Feature;

use AlicFeng\Kubernetes\Kubernetes;
use Tests\TestCase;

class DeploymentTest extends TestCase
{
    const DEPLOYMENT_NAME = 'testing-deployment';

    public function testCreate(): void
    {
        $response = Kubernetes::deployment(self::getKubernetesConfig())
            ->setApiVersion('apps/v1')
            ->setNamespace($this->getNamespace())
            ->setMetadata([
                'name' => self::DEPLOYMENT_NAME,
            ])
            ->setSpec([
                'selector' => [
                    'matchLabels' => [
                        'app' => 'nginx',
                    ],
                ],
                'replicas' => 1,
                'template' => [
                    'metadata' => [
                        'labels' => [
                            'app' => 'nginx',
                        ],
                    ],
                    'spec'     => [
                        'containers' => [
                            [
                                'name'  => 'nginx',
                                'image' => 'nginx:latest',
                                'ports' => [
                                    [
                                        'containerPort' => 80,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ], ])->create();

        $this->assertKubernetesResponse($response);
    }

    public function testList(): void
    {
        $response = Kubernetes::deployment(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->list();

        $this->assertKubernetesResponse($response);
    }

    public function testListAllNamespace(): void
    {
        $response = Kubernetes::deployment(self::getKubernetesConfig())
            ->list(true);

        $this->assertKubernetesResponse($response);
    }

    public function testQueryStatus(): void
    {
        $response = Kubernetes::deployment(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->queryStatus(self::DEPLOYMENT_NAME);

        $this->assertKubernetesResponse($response);
    }

    public function testRepair(): void
    {
        $response = Kubernetes::deployment(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->repair(self::DEPLOYMENT_NAME, [
                'spec' => [
                    'replicas' => 2,
                ],
            ]);

        $this->assertKubernetesResponse($response);
    }

    public function testGetScale(): void
    {
        $response = Kubernetes::deployment(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->getScale('testing-deployment');

        $this->assertKubernetesResponse($response);
    }

    public function testDelete(): void
    {
        $response = Kubernetes::deployment(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->remove('testing-deployment');

        $this->assertKubernetesResponse($response);
    }
}
