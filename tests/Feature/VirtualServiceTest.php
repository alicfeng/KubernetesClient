<?php
/**
 * Created by AlicFeng at 2021/3/9 下午10:08
 */

namespace Tests\Feature;


use AlicFeng\Kubernetes\Asm;
use AlicFeng\Kubernetes\Helper\CertHelper;
use AlicFeng\Kubernetes\Kubernetes;
use Tests\TestCase;

class VirtualServiceTest extends TestCase
{
    public function testListAllNamespace(): void
    {
//        dd(CertHelper::transform('.config',env('cert_storage_dir'),'asm'));
        $response = Asm::virtualService(self::getKubernetesConfig())
            ->list(true);

        dd($response);

        $this->assertKubernetesResponse($response);
    }
}
