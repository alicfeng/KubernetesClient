<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests;

use AlicFeng\Kubernetes\Base\KubernetesClient;
use Orchestra\Testbench\Concerns\CreatesApplication;
use PHPUnit\Framework\TestCase as BaseTestCase;

//use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use CreatesApplication;

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
            'token'    => env('token'),
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

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        config(['kubernetes.api_version' => [
            'pod'                     => env('api_version_pod'),
            'deployment'              => env('api_version_deployment'),
            'service'                 => env('api_version_service'),
            'job'                     => env('api_version_job'),
            'config_map'              => env('api_version_config_map'),
            'persistent_volume_claim' => env('api_version_persistent_volume_claim'),
            'ingress'                 => env('api_version_ingress'),
            'networking_ingress'      => env('api_version_networking_ingress'),
            'secret'                  => env('api_version_secret'),
            'node'                    => env('api_version_node'),
            'daemon_set'              => env('api_version_daemon_set'),
        ]]);
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->createApplication();
    }
}
