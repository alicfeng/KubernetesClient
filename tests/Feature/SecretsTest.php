<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Feature;

use AlicFeng\Kubernetes\Kubernetes;
use Tests\TestCase;

class SecretsTest extends TestCase
{
    public function testCreate(): void
    {
        $response = Kubernetes::secrets(self::getKubernetesConfig())
            ->setApiVersion('v1')
            ->setNamespace($this->getNamespace())
            ->setMetadata([
                'name' => 'testing-secret',
            ])
            ->setData([
                'username' => base64_encode('admin'),
                'password' => base64_encode('admin'),
            ])->create();

        $this->assertKubernetesResponse($response);
    }

    public function testList(): void
    {
        $response = Kubernetes::job(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->list();

        $this->assertKubernetesResponse($response);
    }

    public function testListAllNamespace(): void
    {
        $response = Kubernetes::secrets(self::getKubernetesConfig())
            ->list(true);

        $this->assertKubernetesResponse($response);
    }

    public function testDelete(): void
    {
        $response = Kubernetes::secrets(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->remove('testing-secret');

        $this->assertKubernetesResponse($response);
    }
}
