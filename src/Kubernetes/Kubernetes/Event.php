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

    public function remove(string $name)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @description查询event事件列表
     * @function list
     *
     * @param bool  $is_all_namespace
     * @param array $query_parameters
     *
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
