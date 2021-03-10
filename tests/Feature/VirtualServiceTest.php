<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Feature;

use AlicFeng\Kubernetes\Asm;
use Tests\TestCase;

class VirtualServiceTest extends TestCase
{
    const NAME = 'testing-samego';

    public function testCreate(): void
    {
        $response = Asm::virtualService(self::getAsmConfig())
            ->setNamespace('istio-system')
            ->setMetadata(
                [
                    'name' => self::NAME,
                ]
            )
            ->setSpec(
                [
                    'hosts'    => [
                        '*',
                    ],
                    'gateways' => [
                        'istio-system/demo-gateway',
                    ],
                    'http'     => [
                        [
                            'match' => [
                                [
                                    'uri' => [
                                        'prefix' => '/dataset',
                                    ],
                                ],
                                [
                                    'uri' => [
                                        'exact' => '/demo',
                                    ],
                                ],
                                [
                                    'headers' => [
                                        'X-Ca-Stage'         => [
                                            'exact' => 'DEMO',
                                        ],
                                        'Platform-Module-Id' => [
                                            'exact' => 'dataset',
                                        ],
                                    ],
                                ],
                            ],
                            'route' => [
                                [
                                    'destination' => [
                                        'host' => 'dataset-sample.application-test.svc.cluster.local',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
            )
            ->create();

        $this->assertKubernetesResponse($response);
    }

    public function testListAllNamespace(): void
    {
        $response = Asm::virtualService(self::getAsmConfig())
            ->list(true);

        $this->assertKubernetesResponse($response);
    }

    public function testList(): void
    {
        $response = Asm::virtualService(self::getAsmConfig())
            ->list(false);

        $this->assertKubernetesResponse($response);
    }

    public function testDelete()
    {
        $response = Asm::virtualService(self::getAsmConfig())
            ->setNamespace('istio-system')
            ->remove(self::NAME);

        $this->assertKubernetesResponse($response);
    }
}
