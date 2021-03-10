<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Feature;

use AlicFeng\Kubernetes\Asm;
use AlicFeng\Kubernetes\Helper\CertHelper;
use Tests\TestCase;

class VirtualServiceTest extends TestCase
{
    public function testListAllNamespace(): void
    {
        dd(CertHelper::transform('.config', env('cert_storage_dir'), 'asm'));
        $response = Asm::virtualService(self::getKubernetesConfig())
            ->list(true);

        dd($response);

        $this->assertKubernetesResponse($response);
    }
}
