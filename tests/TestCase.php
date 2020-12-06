<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests;

use AlicFeng\Kubernetes\Base\KubernetesClient;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * @function    kubernetesConfig
     * @description 获取 Kubernetes 环境配置
     * @author      AlicFeng
     * @datatime    20-7-23 下午5:26
     */
    protected static function getKubernetesConfig(): array
    {
        return [
            'base_uri' => env('host') . ':' . env('port'),
            'username' => env('username'),
            'password' => env('password'),
        ];
    }

    /**
     * @function    getNamespace
     * @description 获取命名空间
     * @author      AlicFeng
     * @datatime    20-7-27 下午3:26
     */
    protected function getNamespace(): string
    {
        return env('namespace') ?? 'default';
    }

    /**
     * @function    assertKubernetesResponse
     * @description 断言 Kubernetes 响应
     * @param KubernetesClient $response
     * @author      AlicFeng
     * @datatime    20-7-27 下午3:44
     */
    protected function assertKubernetesResponse($response): void
    {
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertContainsEquals($response->getResponse()->getStatusCode(), [200, 201]);
        $this->assertJson($response->getResponse()->getBody()->getContents());
    }
}
