<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * @function    kubernetesConfig
     * @description 获取 Kubernetes 环境配置
     * @return array
     * @author      AlicFeng
     * @datatime    20-7-23 下午5:26
     */
    public static function kubernetesConfig(): array
    {
        return [
            'base_uri' => env('host') . ':' . env('port'),
            'username' => env('username'),
            'password' => env('password'),
        ];
    }
}
