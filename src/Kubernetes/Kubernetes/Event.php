<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\Kubernetes;

use AlicFeng\Kubernetes\Base\KubernetesClient;
use AlicFeng\Kubernetes\Base\KubernetesManagerIf;

class Event extends KubernetesClient implements KubernetesManagerIf
{
    public function create(array $package = [])
    {
        // TODO: Implement create() method.
    }

    public function apply(string $name, array $package = [])
    {
        // TODO: Implement apply() method.
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
        // TODO: Implement remove() method.
        return $this;
    }

    /**
     * @description查询event事件列表
     * @function   list
     *
     * @param bool  $is_all_namespace 是否所有命名空间
     * @param array $query_parameters 查询参数
     * @return $this
     */
    public function list(bool $is_all_namespace = false, array $query_parameters = []): self
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/events";
        if ($is_all_namespace) {
            $uri = '/api/v1/events';
        }

        return $this->_list($uri, $query_parameters);
    }

    public function queryStatus(string $name)
    {
        // TODO: Implement queryStatus() method.
    }

    public function repair(string $name, array $package)
    {
        // TODO: Implement repair() method.
    }
}
