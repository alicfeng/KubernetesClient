<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Value comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 * AlicFeng | a@samego.com
 */

namespace AlicFeng\Kubernetes\Kubernetes;

use AlicFeng\Kubernetes\Base\KubernetesClient;
use AlicFeng\Kubernetes\Base\KubernetesManagerIf;

/**
 * Class Deployment | 应用部署管理类.
 */
class Deployment extends KubernetesClient implements KubernetesManagerIf
{
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * @function    新建资源项
     * @description 新建资源项
     *
     * @param array $package 期待的资源配置
     *
     * @return mixed
     */
    public function create(array $package = [])
    {
        $uri = "/apis/batch/v1/namespaces/{$this->namespace}/jobs";

        return $this->_create($uri, self::TYPE_JOB, $package);
    }

    /**
     * @function    修改资源项
     * @description 修改指定资源项
     *
     * @param string $name    资源名称
     * @param array  $package 期待的资源配置
     *
     * @return mixed
     */
    public function apply(string $name, array $package = [])
    {
        $uri = "/apis/apps/v1/namespaces/{$this->namespace}/deployments/{$name}";

        return $this->_apply($uri, self::TYPE_SERVICE, $package);
    }

    /**
     * @function    删除资源项
     * @description 删除指定资源项
     *
     * @param string $name 资源名称
     *
     * @return mixed
     */
    public function remove(string $name)
    {
        $uri = "/apis/apps/v1/namespaces/{$this->namespace}/deployments/{$name}";

        return $this->_remove($uri);
    }

    /**
     * @function    查询资源列表结合
     * @description 默认为具体的默认命名空间
     *
     * @param bool $is_all_namespace 是否为所有命名空间
     *
     * @return mixed
     */
    public function list(bool $is_all_namespace = false)
    {
        $uri = "/apis/apps/v1/namespaces/{$this->namespace}/deployments";
        if ($is_all_namespace) {
            $uri = '/apis/apps/v1/deployments';
        }

        return $this->_list($uri);
    }

    /**
     * @function    查询资源列表结合
     * @description 默认为具体的默认命名空间
     *
     * @param string $name 资源名称
     *
     * @return mixed
     */
    public function queryStatus(string $name)
    {
        $uri = "/apis/app s/v1/namespaces/{$this->namespace}/deployments/{$name}/status";

        return $this->_queryStatus($uri);
    }
}
