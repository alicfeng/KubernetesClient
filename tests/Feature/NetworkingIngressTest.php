<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Feature;

use AlicFeng\Kubernetes\Kubernetes;
use Tests\TestCase;

class NetworkingIngressTest extends TestCase
{
    public function testCreate(): void
    {
        $response = Kubernetes::networkingIngress(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->setMetadata([
                'name'        => 'testing-networking-ingress',
                'annotations' => [
                    'kubernetes.io/ingress.class'                 => 'nginx',
                    'nginx.ingress.kubernetes.io/proxy-body-size' => '1024m',
                ],
            ])->setSpec([
                'rules' => [
                    [
                        'http' => [
                            'paths' => [
                                [
                                    'path'    => '/demo',
                                    'backend' => [
                                        'serviceName' => 'demo',
                                        'servicePort' => 80,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ])->create();

        $this->assertKubernetesResponse($response);
    }
}
