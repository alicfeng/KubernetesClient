<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests\Feature;

use AlicFeng\Kubernetes\Kubernetes;
use Tests\TestCase;

class PersistentVolumeClaimTest extends TestCase
{
    const PVC_NAME = 'testing-pvc';

    public function testCreate(): void
    {
        $response = Kubernetes::persistentVolumeClaim(self::getKubernetesConfig())
            ->setNamespace($this->getNamespace())
            ->setMetadata(['name' => self::PVC_NAME])
            ->setSpec([
                'volumeName'       => 'ev-device-pvc-testing',
                'accessModes'      => [
                    'ReadWriteOnce',
                ],
                'resources' => [
                    'requests' => [
                        'storage' => '10Gi',
                    ],
                ],
            ])->create();
        $this->assertKubernetesResponse($response);
    }

    public function testQueryStatus(): void
    {
        $response = Kubernetes::persistentVolumeClaim(self::getKubernetesConfig())->setNamespace($this->getNamespace())->queryStatus(self::PVC_NAME);

        $this->assertKubernetesResponse($response);
    }
}
