<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\Kubernetes;

use AlicFeng\Kubernetes\Base\KubernetesClient;
use AlicFeng\Kubernetes\Base\KubernetesManagerInterface;

class ConfigMap extends KubernetesClient implements KubernetesManagerInterface
{
    /**
     * @function    新建资源项
     * @description 新建资源项
     *
     * @param array $package 期待的资源配置
     *
     * @return $this
     */
    public function create(array $package = [])
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/configmaps";

        return $this->_create($uri, self::TYPE_CONFIG_MAP, $package);
    }

    /**
     * @function    修改资源项
     * @description 修改指定资源项
     *
     * @param string $name    资源名称
     * @param array  $package 期待的资源配置
     *
     * @return $this
     */
    public function apply(string $name, array $package = [])
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/configmaps/{$name}";

        return $this->_apply($uri, self::TYPE_CONFIG_MAP, $package);
    }

    /**
     * @function    删除资源项
     * @description 删除指定资源项
     * @param string $name             资源名称
     * @param array  $query_parameters 可选参数
     * @return $this
     */
    public function remove(string $name, array $query_parameters = [])
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/configmaps/{$name}";

        return $this->_remove($uri, $query_parameters);
    }

    /**
     * @function    查询资源列表结合
     * @description 默认为具体的默认命名空间
     *
     * @param bool  $is_all_namespace 是否为所有命名空间
     * @param array $query_parameters 查询参数
     *
     * @return $this
     */
    public function list(bool $is_all_namespace = false, array $query_parameters = [])
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/configmaps";
        if ($is_all_namespace) {
            $uri = '/api/v1/configmaps';
        }

        return $this->_list($uri, $query_parameters);
    }

    /**
     * @function    查询资源项状态
     * @description 查询资源项状态
     *
     * @param string $name 资源项名称
     *
     * @return $this
     * @deprecated
     */
    public function queryStatus(string $name)
    {
        // TODO: Implement queryStatus() method.
        return $this;
    }

    /**
     * @function     修改部分资源项
     * @description  修改部分资源项
     *
     * @param string $name    资源名称
     * @param array  $package 期待的资源配置
     *
     * @return $this
     */
    public function repair(string $name, array $package = [])
    {
        // TODO: Implement repair() method.
        return $this;
    }
}
