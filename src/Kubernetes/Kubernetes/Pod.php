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

class Pod extends KubernetesClient implements KubernetesManagerIf
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
     * @return $this
     */
    public function create(array $package = [])
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/pods";

        return $this->_create($uri, self::TYPE_POD, $package);
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
        $uri = "/api/v1/namespaces/{$this->namespace}/pods/{$name}";

        return $this->_apply($uri, self::TYPE_POD, $package);
    }

    /**
     * @function    查询资源列表结合
     * @description 默认为具体的默认命名空间
     *
     * @param bool  $is_all_namespace 是否为所有命名空间
     * @param array $query            查询参数
     *
     * @return $this
     */
    public function list(bool $is_all_namespace = false, array $query = [])
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/pods";
        if ($is_all_namespace) {
            $uri = '/api/v1/pods';
        }

        if (!empty($query)) {
            $uri .= '?'.http_build_query($query);
        }

        return $this->_list($uri);
    }

    /**
     * @function    查询资源项状态
     * @description 查询资源项状态
     *
     * @param string $name 资源项名称
     *
     * @return $this
     */
    public function queryStatus(string $name)
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/pods/{$name}/status";

        $this->response = $this->get($uri);

        return $this;
    }

    /**
     * @function    删除资源项
     * @description 删除指定资源项
     *
     * @param string $name 资源名称
     *
     * @return $this
     */
    public function remove(string $name)
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/pods/$name";

        return $this->_remove($uri);
    }

    /**
     * @function    patch 修改资源
     * @description  patch 修改资源
     *
     * @param string $name    资源名称
     * @param array  $package 期待的资源配置
     *
     * @return $this
     */
    public function patch(string $name, array $package = [])
    {
        // TODO: Implement patch() method.
        return $this;
    }

    /**
     * @desc 获取pod日志
     * @function log
     *
     * @param string $name  pod名称
     * @param array  $query 查询参数
     *
     * @return $this
     */
    public function log(string $name, array $query = [])
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/pods/{$name}/log";

        if (!empty($query)) {
            $uri .= '?'.http_build_query($query);
        }

        $this->response = $this->get($uri);

        return $this;
    }
}
