<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Feature;

use AlicFeng\Kubernetes\Kubernetes;
use Tests\TestCase;

class NodeTest extends TestCase
{
    const NODE_NAME = 'node01';

    public function testList(): void
    {
        $response = Kubernetes::node(self::getKubernetesConfig())->list();

        $this->assertKubernetesResponse($response);
    }

    public function testRepair(): void
    {
        $response = Kubernetes::node(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->repair(self::NODE_NAME, [
                'metadata' => [
                    'labels' => [
                        'gpu_amount' => (string) '10',
                    ],
                ],
            ]);

        $this->assertKubernetesResponse($response);
    }
}
